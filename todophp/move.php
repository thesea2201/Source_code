<?php
	require_once 'app/init.php';

	if(isset($_GET['itemid']))
	{
		$itemid = $_GET['itemid'];
		if(!empty($itemid))
		{
			$removeQuery = $db->prepare("
				delete from item where itemid = :itemid
			");
			$removeQuery->execute([
				'itemid'=>$itemid
			]);
		}
	}
	header("Location: index.php")
?>
