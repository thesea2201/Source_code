<?php
	session_start();
	$_SESSION["userid"] =  1;


	$db = new PDO('mysql:dbname=todolist; host=localhost', 'root', '');
	if(!isset($_SESSION['userid']))
	{
		die('You are not signed in?');
	}else
	{
		
	}

?>