<?php

	$namespace;
	$class;
	$permissons;

	getNamespaceClass();
	checkPermission($class, $namespace, $token);

	function getNamespaceClass($parts){
		$relativeUrl = str_replace('/data/','',$_SERVER["REQUEST_URI"]);
		$urlPaths;
		if (strpos($relativeUrl, "?"))
			$urlPaths = substr($relativeUrl, 0, strpos($relativeUrl, "?"));
		else
			$urlPaths = $relativeUrl;

		$parts = explode('/', $urlPaths);

		switch(sizeof($parts)){
			case 1:
				$class = $parts[0];
				$namespace = $_SERVER['HTTP_HOST'];
				break;
			case 2:
				$class = $parts[1];
				$namespace = $parts[0];
				break;
			default:
				break;
		}
	}


	function checkPermission($p){
		$publicTenants = array('duoworld.duoweb.info', 'appmarket.duoweb.info','users.duoweb.info');
		//r = GET / POST
		//w = POST / DELETE
		//d = none;
	}

	/*
	require_once("./config.php");
	require_once("./SchemaValidator.php");

	$json = '{"ApplicationID" : "Supun", "Titles" :"Test"}';

	$validator = new SchemaValidator();
	$result = $validator->validate("duoworld.duoweb.info", "application", $json);
	
	var_dump($result);
	*/

?>