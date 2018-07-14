<head>
	<title>Upload file</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<form action="" method="post" enctype="multipart/form-data">
				<input class="form-control" type="file" name="upload">
				<input type="submit" class="btn btn-success" value="Upload" name="submit">
			</form>
		</div>
	

	<?php
		require_once 'init.php';
		$image_type = array('image/jpg', 'image/png', 'image/gif','image/jpeg', 'image/bmp');
		if(isset($_POST['submit']))
		{
			if(isset($_FILES['upload']) && isset($_FILES['upload']['name']))
			{
				if(in_array($_FILES['upload']['type'], $image_type))
				{
					//get name of file
					$file_name = $_FILES['upload']['name'];
					//get temp path to save file.
					$file_tmp = $_FILES['upload']['tmp_name'];
					// create file path in host
					$file_path = 'upload/'.$file_name;
					//upload file in temp path to path in host
					move_uploaded_file($file_tmp, $file_path);

					//ghi xuong csdl
					$addQuery = $db->prepare("
							insert into image(imgid, imgpath) values(NULL,:file_name)
						");
					$addQuery->execute([
						'file_name'=> $file_path
					]);
					header("Location: index.php");
				}
			}
		}
		$getPathQuery = $db->prepare("
				select * from image  group by imgid desc
			");

		$getPathQuery->execute();
		$images = $getPathQuery->rowcount() ? $getPathQuery:[]; 

		foreach($images as $image) 
		{
			echo "<img width='700px' src='".$image['imgpath']."' class='rounded mx-auto d-block image' alt='".$image['imgpath']."' >";
		}
?>
		
	</div><!-- end container -->

