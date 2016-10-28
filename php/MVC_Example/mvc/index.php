<?php
	require("config/define_path.php");
	require("libs/database.php");
	require("libs/basecontroller.php");
	require("libs/basemodel.php");
	require("libs/view.php");
	require("libs/loader.php");


	$loader = new Loader();
	$controller = $loader->createController();
	$controller->executeAction();