<?php
	include "connect.php";

?>
<!DOCTYPE html>
<html>

<head>
	<title>bai hat</title>
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
		$('#select-tencs').change(function(){// nếu mà chọn ca sĩ thì :
			$macs = $(this).val();//lấy mã ca sĩ đó.

			$.get("ajax_selectalbum.php?macs="+ $macs, function(data, status){//gởi bằng get với trên là macs
				$("#list-album").html(data);//lấy dữ liệu về đổ lên div listalbum
			})
		});
		$("#list-album").change(function(){
			$maab = $(this).val();

			$.get("ajax_showbaihat.php?maab=" + $maab, function(data,status){
				$("#table-baihat").html(data);
			});
		});
	})
</script>

<body>
	<div>
		<div class="show-casi">
			<table>
				<tr>
					<th>Ten ca si:</th>
					<td>
						<form method="get">	<!--chổ này là list ra ds các ca sĩ. -->
							<select id="select-tencs" size=1>
							<?php 

								$rs=$conn->query("select macs, tencs from casi");
								echo "<option>Tên ca sĩ</option>";
								while ($row = $rs-> fetch_row()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								}
							 ?>

						</form>
					</select>
					</td>
				</tr>
				<tr>
					<th>Ten album</th>
					<td><select id="list-album"></select></td>
				</tr>
			</table>
			<div id="table-baihat"></div> 
		</div>
	</div>
</body>
</html>