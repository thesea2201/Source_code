<?php
	include "connect.php";
	$macs = $_GET["macs"];
	$sql = "select * from album where macs = '$macs'";
	$result = $conn-> query($sql);
	if(mysqli_num_rows($result))
	{
		echo "<option><strong>Tên album</strong></option>";
		while($row= $result->fetch_array())
		{
			echo "<option value='".$row['maab']."'>".$row['tenab']."</option>";
		}
	}
//đây là trong select album, có các option đã lọc từ mã ca sĩ.
?>
