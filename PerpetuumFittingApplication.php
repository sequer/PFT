<?php

namespace Perpetuum\Fitting\Application;

class ItemRepository extends \Apex\Application\Repository
{
	protected $mapper;
	
	public function __construct($pdo)
	{
		$this->mapper = new ItemMapper($pdo);
	}
	
	public function getById($id)
	{
		return $this->mapper->fetchById($id);
	}
}

class ItemMapper extends \Apex\Application\Mapper
{
	protected $pdo;
	
	public function fetchById($id)
	{
		$stmt = $this->pdo->prepare('
			SELECT * 
			FROM `items` 
			LEFT JOIN item_parameters USING(item_id)
			LEFT JOIN parameters USING(parameter_id)
			WHERE `item_id` = :item_id
		');
		$stmt->execute(array('item_id' => $id));
		$parameters = array();
		while ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			$parameterArray[$result['parameter_id']] = $result;
			$itemArray = $result;
		}
		$itemArray['item_normalized'] = unserialize($itemArray['item_denormalization']);
		switch(end($itemArray['item_normalized']['groups']))
		{
			default:
				return false;
				break;
			
			case 'Robots':
				$item = new \Perpetuum\Fitting\Domain\Robot;
				break;
			
			case 'Ammo/charges':
				$item = new \Perpetuum\Fitting\Domain\Charge;
				break;
			
			case 'Equipment':
				$item = new \Perpetuum\Fitting\Domain\Module;
				break;
		}
		
		$item->setId($itemArray['item_id']);
		$item->setName($itemArray['item_name']);
		
		foreach($itemArray['item_normalized']['groups'] as $name) {
			$group = new \Perpetuum\Fitting\Domain\Group;
			$group->setName($name);
			$item->addGroup($group);
		}
		
		// conditional groups .. maybe move to a different method/class?
		
		if ($item->hasGroup('Armor repairers') || $item->hasGroup('Remote armor repairers')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Armor repair amount bonus');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Miner modules') || $item->hasGroup('Harvesting modules')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Miner and harvesting modules');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Light lasers') || $item->hasGroup('Medium lasers')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Laser turrets');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Light conventional firearms') || $item->hasGroup('Medium conventional firearms')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Firearm turrets');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Light magnetic weapons') || $item->hasGroup('Medium magnetic weapons')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Magnetic weapon turrets');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Laser turrets') ||$item->hasGroup('Firearm turrets') ||$item->hasGroup('Magnetic weapon turrets')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Turrets');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Light missile launchers') || $item->hasGroup('Medium missile launchers')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Ballistics');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Weapon tunings') && $item->hasGroup('Magnetic weapons')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Magnetic weapon tunings');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Weapon tunings') && $item->hasGroup('Firearms')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Firearm tunings');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Weapon tunings') && $item->hasGroup('Lasers')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Laser tunings');
			$item->addGroup($group);
		}
		
		if ($item->hasGroup('Weapon tunings') && $item->hasGroup('Missile launchers')) {
			$group = new \Perpetuum\Fitting\Domain\Group(null, 'Missile launcher tunings');
			$item->addGroup($group);
		}
		
		// add parameters
		
		foreach($parameterArray as $value) {
			$parameter = new \Perpetuum\Fitting\Domain\Parameter;
			$parameter->setId($value['parameter_id']);
			$parameter->setName($value['parameter_name']);
			$parameter->setValue($value['parameter_value']);
			$item->addParameter($parameter);
		}
		
		// add bonuses
		
		if (get_class($item) == 'Perpetuum\Fitting\Domain\Robot') {
			require('PerpetuumDataRobotBonuses.php');
			if (isset($robotBonuses[$item->getName()])) {
				foreach($robotBonuses[$item->getName()] as $array) {
					$extension = new \Perpetuum\Domain\Extension(null, $array['extension']);
					$parameter = new \Perpetuum\Fitting\Domain\Parameter(null, $array['parameter']);
					$bonus = new \Perpetuum\Fitting\Domain\RobotBonus;
					$bonus->setExtension($extension);
					$bonus->setParameter($parameter);
					$bonus->setBonus($array['bonus']);
					$bonus->setTarget(isset($array['apply']) ? $array['apply'] : 'Robot');
					$item->addBonus($bonus);
				}
			}
		}
		
		return $item;
	}
}

class FittingRepository extends \Apex\Application\Repository
{
	protected $mapper;
	
	public function __construct($pdo)
	{
		$this->mapper = new FittingMapper($pdo);
	}
	
	public function getById($id)
	{
		return $this->mapper->fetchById($id);
	}
}

class FittingMapper extends \Apex\Application\Mapper
{
	protected $pdo;
	
	public function fetchById($id)
	{
		$itemRepository = new ItemRepository($this->pdo);
		
		$stmt = $this->pdo->prepare('
			SELECT *
			FROM fittings f
			WHERE `fitting_id` = :fitting_id
			LIMIT 1
		');
		$stmt->execute(array('fitting_id' => $id));
		if (($result = $stmt->fetch(\PDO::FETCH_ASSOC)) == false) {
			return null;
		}
		
		$fitting = new \Perpetuum\Fitting\Domain\Fitting;
		$fitting->setId($result['fitting_id']);
		$fitting->setName($result['fitting_name']);
		
		$robot = $itemRepository->getById($result['robot_id']);
		
		$fitting->setRobot($robot);
		
		$stmt = $this->pdo->prepare('
			SELECT * FROM fitting_fitted WHERE `fitting_id` = :fitting_id');
		$stmt->execute(array('fitting_id' => $id));
		while ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			$item = $itemRepository->getById($result['item_id']);
			$fitting->getRobot()->addItem($item);
		}
		
		return $fitting;
	}
}