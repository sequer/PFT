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

/*$agent = $agentRepository->getFromExport('extensionhistory.csv');
var_dump($agent);*/

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

$agent = $agentRepository->getById(47);
$fitting = $fittingRepository->getById(21);
$fitting->setAgent($agent);
$fitting->applyHungarianMath();



var_dump($fitting);