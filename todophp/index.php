<?php
	require_once 'app/init.php';
	$itemsQuery = $db->prepare('select * from item where userid = :user');
	$itemsQuery->execute(['user'=>$_SESSION["userid"]]);
	$items = $itemsQuery->rowcount()? $itemsQuery : [];
?>

<!DOCTYPE html>
<html>
<head>
	<title>To do list</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" > </script>
<body>
	<div class="container">
		<div class="header">

			<h1> To do list</h1>	

			<ul class="items">
			
			<?php 
			if(!empty($items))
			{
				foreach ($items as $item) 
				{									
					if($item['DONE']==0)
					{
			?>
						<li>
							<span class="item"><?php echo $item['TITLE']?> </span>
							<a href="mark.php?as=done&itemid=<?php echo $item['ITEMID']; ?>" class="done-button">
							Mark as done</a>
							<a href="move.php?itemid=<?php echo $item['ITEMID']; ?>" class="done-button">Move</a>
						</li>										
			<?php 
					}
					else{
			?>
						<li>
							<span class="item done"><?php echo $item['TITLE']?> </span>
							<a href="move.php?itemid=<?php echo $item['ITEMID']; ?>" class="done-button">Move</a>
						</li>							
			<?php 
					}
				}
			}else{ 
			?>
				<li>
					<span class="item"><i>Nothing here!!!</i> </span>
				</li>
			<?php }?>

			<form class="item-add" action="add.php" method="post">
				<input type="text" class="input" name="title" placeholder="Text new item here!">
				<input type="submit" class="submit" value="Add">
			</form>
			

		</div><!-- end header-->
	</div><!-- end container -->
</body>
</html>