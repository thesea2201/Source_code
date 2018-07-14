<!DOCTYPE html>
<html>
<head>
	<title>Thêm ca sĩ</title>
	<link rel="stylesheet" href="/thuchanh/style.css" type="text/css" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>


<?php include 'connect.php'?>


<script type="text/javascript">
	$(document).ready(function(){
		$(".btnThem").click(function(){
			<?php 
				$sql = 'insert into casi values (';

			?>
		})
	})


</script>
<body>
	<div class="container">
		<table cellpadding="10">
			<tr>
				<td>Tên ca sĩ</td>
				<td> <input class ="in_tencs" id="in_tencs" type="text" name="" placeholder="Tên ca sĩ"></td>
			</tr>
			<tr>
				<td>Giới tính</td>
				<td> <input type="radio" name="gioitinh">Nam </td>
				<td> <input type="radio" name="gioitinh">Nữ </td>	
				
			</tr>
			<tr>
				<td id= 'btnThem' colspan="2" ><button>Thêm</button></td>
			</tr>
		</table>
	</div>
</body>
</html>