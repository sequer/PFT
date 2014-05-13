<?php

namespace Perpetuum\Application;

class AgentRepository extends \Apex\Application\Repository
{
	public function __construct($pdo)
	{
		$this->mapper = new AgentMapper($pdo);
	}
	
	public function getById($id)
	{
		return $this->mapper->fetchById($id);
	}
	
	public function getFromExport($filename)
	{
		return $this->mapper->load($filename);
	}
}

class AgentMapper extends \Apex\Application\Mapper
{
	public function fetchById($id)
	{
		// agent
		
		$stmt = $this->pdo->prepare('SELECT * FROM `agents` WHERE `agent_id` = :id');
		$stmt->execute(array('id' => $id));
		if (($result = $stmt->fetch(\PDO::FETCH_ASSOC)) == false) return null;
		$result['agent_education'] = unserialize($result['agent_education']);
		
		$agent = new \Perpetuum\Domain\Agent;
		$agent->setId($result['agent_id']);
		$agent->setName($result['agent_name']);
		$agent->setMegacorporation($result['agent_education']['megacorporation']);
		$agent->setSchool($result['agent_education']['school']);
		$agent->setSpeciality($result['agent_education']['speciality']);
		
		// extensions, starter extensions
		
		require('PerpetuumDataExtensions.php');
		
		foreach($startingExtensionsMegacorporations[$agent->getMegacorporation()] as $extensionName => $extensionLevel) {
			$extension = new \Perpetuum\Domain\AgentExtension($extensionName, $extensionLevel);
			$extension->setComplexity($extensions[$extension->getName()]['complexity']);
			$agent->addExtension($extension);
		}
		
		foreach($startingExtensionsSchools[$agent->getSchool()] as $extensionName => $extensionLevel) {
			$extension = new \Perpetuum\Domain\AgentExtension($extensionName, $extensionLevel);
			$extension->setComplexity($extensions[$extension->getName()]['complexity']);
			$agent->addExtension($extension);
		}
		
		foreach($startingExtensionsSpecialities[$agent->getSpeciality()] as $extensionName => $extensionLevel) {
			$extension = new \Perpetuum\Domain\AgentExtension($extensionName, $extensionLevel);
			$extension->setComplexity($extensions[$extension->getName()]['complexity']);
			$agent->addExtension($extension);
		}
		
		// extensions, saved extensions
		
		$stmt = $this->pdo->prepare('SELECT * FROM `agent_extensions` WHERE `agent_id` = :agent_id');
		$stmt->execute(array('agent_id' => $agent->getId()));
		while ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
			if (isset($extensions[$result['extension_name']])) {
				$extension = new \Perpetuum\Domain\AgentExtension($result['extension_name'], $result['extension_level']);
				$extension->setComplexity($extensions[$extension->getName()]['complexity']);
				$agent->addExtension($extension);
			}
		}
		
		return $agent;
	}
	
	public function load($filename)
	{
		$csvParser = new \Perpetuum\Services\CsvParser;
		$csv = $csvParser->load($filename)->toArray();
		unset($csv[0]); // remove header
		var_dump($csv);
		$extensions = array();
		foreach($csv as $line) {
			
		}
	}
}

class ExtensionRepository extends \Apex\Application\Repository
{
	public function __construct($pdo)
	{
		$this->mapper = new ExtensionMapper($pdo);
	}
}

class ExtensionMapper
{
	
}

