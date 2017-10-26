<?php
	header("content_type:txt/html;charset=utf-8");
	date_default_timezone_set('Asia/Shanghai');
	$controller = isset($_GET['c']) ? $_GET['c'] : 'Home';
	$action     = isset($_GET['a']) ? $_GET['a'] : 'lists';
	session_start();
	include "./common/function.php";
	$className = $controller.'Controller';
	$con = new $className();
	$con ->$action();
