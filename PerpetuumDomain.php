<?php

namespace Perpetuum\Domain;

class Agent extends \Apex\Domain\NamedEntity
{
	protected $extensions = array();
	protected $spark;
	protected $megacorporation;
	protected $school;
	protected $speciality;
	
	public function addExtension($extension)
	{
		if ($extension->getLevel() > $this->getExtension($extension->getName())->getLevel()) // update agent's extensions only when level is higher
			$this->extensions[$extension->getName()] = $extension;
	}
	
	public function setExtension($extension)
	{
		$this->extensions[$extension->getName()] = $extension;
	}
	
	public function getExtension($name)
	{
		return isset($this->extensions[$name]) ? $this->extensions[$name] : new AgentExtension($name, 0);
	}
	
	public function getExtensionLevel($name)
	{
		if ($extension = $this->getExtension($name)) return $extension->getLevel();
		else return 0;
	}
	
	public function setSpark($spark)
	{
		$this->spark = $spark;
	}
	
	public function getSpark()
	{
		return $this->spark;
	}
	
	public function setMegacorporation($megacorporation)
	{
		$this->megacorporation = $megacorporation;
	}
	
	public function getMegacorporation()
	{
		return $this->megacorporation;
	}
	
	public function setSchool($school)
	{
		$this->school = $school;
	}
	
	public function getSchool()
	{
		return $this->school;
	}
	
	public function setSpeciality($specialization)
	{
		$this->speciality = $specialization;
	}
	
	public function getSpeciality()
	{
		return $this->speciality;
	}
}

class Extension extends \Apex\Domain\NamedEntity
{
	protected $complexity;
	
	public function setComplexity($complexity)
	{
		$this->complexity = $complexity;
	}
	
	public function getComplexity()
	{
		return $this->complexity;
	}
	
	public function getEPCost($level)
	{
		$multipliers = array(
			1 => 1,
			2 => 1,
			3 => 1,
			4 => 1,
			5 => 1,
			6 => 2,
			7 => 3,
			8 => 4,
			9 => 5,
			10 => 10
		);
		return (60 * $this->getComplexity() * $level * $multipliers[$level]);
	}
	
	public function getNICCost($level)
	{
		return (5000 * (pow($this->getComplexity(), 2)));
	}
}

class AgentExtension extends Extension
{
	protected $level = 0;
	
	public function __construct($name, $level)
	{
		$this->setName($name);
		$this->setLevel($level);
	}
	
	public function setLevel($level)
	{
		$this->level = intval($level);
	}
	
	public function getLevel()
	{
		return $this->level;
	}
}

class Spark extends \Apex\Domain\NamedEntity
{
	protected $bonuses = array();
	
	public function addBonus($bonus)
	{
		$this->bonuses[] = $bonus;
	}
	
	public function getBonuses()
	{
		return $this->bonuses;
	}
}

class SparkBonus
{
	private $parameter; // effect
	private $bonus;
	private $target;
	
	public function setParameter($parameter)
	{
		$this->parameter = $parameter;
	}
	
	public function getParameter()
	{
		return $this->parameter;
	}
	
	public function setBonus($bonus)
	{
		$this->bonus = $bonus;
	}
	
	public function getBonus()
	{
		return $this->bonus;
	}
	
	public function setTarget($target)
	{
		$this->target = $target;
	}
	
	public function getTarget()
	{
		return $this->target;
	}
}
