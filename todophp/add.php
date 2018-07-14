<?php
	require_once 'app/init.php';
	if (isset($_POST['title'])) {
		$title = trim($_POST['title']);
		if(!empty($title))
		{
			$addQuery = $db->prepare("insert into item(itemid, title, userid, done, created) values(NULL, :title, :userid, 0, NOW() )");
			$addQuery->execute([
				'title'=> $title,
				'userid'=>$_SESSION['userid']
			]);

		}
	}
	header("Location: index.php");
?>