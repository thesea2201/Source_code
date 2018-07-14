<?php
	require_once 'app/init.php';

	if(isset($_GET['as']) and isset($_GET['itemid']))
	{
		$as = $_GET['as'];
		$itemid = $_GET['itemid'];
		switch ($as) {
			case 'done':
				$removeQuery = $db->prepare("
					update item set DONE = 1 where ITEMID = :itemid and USERID = :userid
					");
				$removeQuery->execute([
					'itemid'=>$itemid,
					'userid'=>$_SESSION['userid']
				]);
			break;
			
		}
	}

?>
<?php	header("Location: index.php");
?>