<?php

/**
 * Perpetuum and all associated logos, artwork, designs, world facts and other recognizable features are the intellectual property of Avatar Creations Ltd.
 */

error_reporting(E_ALL);

require('ApexDomain.php');
require('ApexApplication.php');
require('PerpetuumDomain.php');
require('PerpetuumApplication.php');
require('PerpetuumServices.php');
require('PerpetuumFittingDomain.php');
require('PerpetuumFittingApplication.php');

require_once('config.php');
$pdo = new PDO($config['database']['pdo'], $config['database']['user'], $config['database']['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$fittingRepository = new \Perpetuum\Fitting\Application\FittingRepository($pdo);
$agentRepository = new \Perpetuum\Application\AgentRepository($pdo);
$sparkRepository = new \Perpetuum\Application\SparkRepository($pdo);

/*
// robot bonused parameters
require('PerpetuumDataRobotBonuses.php');
$params = array();
foreach($robotBonuses as $robot) {
	foreach($robot as $bonus) {
		$bonus['apply'] = isset($bonus['apply']) ? $bonus['apply'] : 'Robot';
		$params[$bonus['apply']][$bonus['parameter']] = true;
	}
}
var_dump($params);
exit;
*/

/*
// spark bonused parameters
require('PerpetuumDataSparks.php');
$params = array();
foreach($sparks as $spark) {
	foreach($spark as $bonus) {
		$bonus['apply'] = isset($bonus['apply']) ? $bonus['apply'] : 'Robot';
		$params[$bonus['apply']][$bonus['parameter']] = true;
	}
}
var_dump($params);
exit;
*/

/*
// get agent from database
$agent = $agentRepository->getById(43);
$agentRepository->importExtensions('extensionhistory.csv', $agent);
var_dump($agent);
exit;
*/

// construct agent manually
$agent = new \Perpetuum\Domain\Agent(null, 'Doek');
$agent->setMegacorporation('ICS - Institute of Corporate Security');
$agent->setSchool('Gnossmann Strategic and Space Research Institute, Dresden');
$agent->setSpeciality('General Military Training');
$agentRepository->setStarterExtensions($agent);
$agentRepository->importExtensions('extensionhistory.csv', $agent);
$spark = $sparkRepository->getByName('Syn-tec GenII/ScX "Egos"');
$agent->setSpark($spark);

//$fitting = $fittingRepository->getById(21);
$fitting = $fittingRepository->getByImport('fit.pft');
$fitting->setAgent($agent);
$fitting->applyHungarianMath();



echo '<style>.info { font-family: Arial; float: left; font-size: 10px; padding: 5px; margin: 5px; border: 1px solid LightGray; } .changed { font-weight: bold; color: Red; }</style>';
echo '<div class="info">';
echo '<strong>' . $fitting->getRobot()->getName() . '</strong><br>';
foreach($fitting->getRobot()->getParameters() as $parameter) {
	echo $parameter->getName() . ': <span class="' . ($parameter->getBaseValue() == $parameter->getValue() ? 'unchanged' : 'changed') . '">' . $parameter->getValue() . '</span><br>';
}
echo '</div>';
foreach($fitting->getRobot()->getFittedModules() as $module) {
	echo '<div class="info">';
	echo '<strong>' . $module->getName() . '</strong><br>';
	foreach($module->getParameters() as $parameter) {
		echo $parameter->getName() . ': <span class="' . ($parameter->getBaseValue() == $parameter->getValue() ? 'unchanged' : 'changed') . '">' . $parameter->getValue() . '</span><br>';
	}
	echo '</div>';
}
echo '<div style="clear: both; float: none;"></div>';


var_dump($fitting);