<?php 
	include 'connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$("#select_casi").change(function(){
			var $macs=$(this).val();	
			$.get("ajax_showalbum.php?macs="+ $macs, function(data, status){
			$("#div_Album_line").html(data);
	});
});
});
</script>
<body>
<!--Show casi-->
<div class="div_body">
	<div class="div_ShowAlbum">
		<table>
			<tr>
				<td><p>Tên ca sĩ:</p></td>
				<td>
					<form name="form-select" method="get">
					<select id="select_casi" size=1>
						<?php 

							$rs=$conn->query("select macs, tencs from casi");
							echo "<option>Ten album</option>";
							while ($row = $rs-> fetch_row()) {
								echo "<option value='".$row[0]."'>".$row[1]."</option>";
							}
						 ?>
					</select>
					</form>
				</td>
			</tr>
		</table>
		
		<h3>Danh sách những album</h3>
		<div id="div_Album_line"></div>
	</div>
</div><!--KT Show casi-->
</body>
</html>
<!---jquery -->
