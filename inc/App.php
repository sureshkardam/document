<?
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['variables'])){
		$_SESSION['variables']=array();
	}

	define('BASEDIR',dirname(__FILE__)."/");
	define('APP_PATH',dirname(__FILE__));


	/******grab configs**********/
	foreach (glob(APP_PATH."/config/*.php") as $filename)
		{
			include $filename;
	}

	/****** Redirect to installer ****/
	if(!defined('DB_NAME')){
		header("Location: ./install/");
	}


	/******grab core files**********/
	foreach (glob(APP_PATH."/classes/*.php") as $filename)
		{
			include $filename;
	}


	//load core functions
	include "helpers/core.php"; //load main functions
	include "helpers/Mailer.php"; //load main functions

	if(isset($_GET['actions'])){
		include "helpers/actions.php"; //load main functions	
	}

	if(isset($_GET['Download'])){
		include "helpers/Download.php"; //load main functions	
	}

?>