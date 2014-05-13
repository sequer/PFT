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

$agent = $agentRepository->getById(47);
$fitting = $fittingRepository->getById(21);
$fitting->setAgent($agent);
$fitting->applyHungarianMath();

var_dump($fitting);