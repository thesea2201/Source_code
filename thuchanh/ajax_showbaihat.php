<?php
	include 'connect.php';
	$maab = $_GET["maab"];
	$sql = "select * from baihat where maab= '$maab'";
	$rs = $conn-> query($sql);
	if(mysqli_num_rows($rs))
	{				
		$dem = 1;
		echo "<tr>";
		echo 	"<th>STT</th>";
		echo 	"<th>Ma bai hat</th>";
		echo 	"<th>Ten bai hat</th>";
		echo "</tr>";
		while($row = $rs->fetch_array())
		{
			echo	"<tr>";
			echo		"<td>".$dem."</td>";
			echo		"<td>".$row["mabh"]."</td>";
			echo		"<td>".$row["tenbh"]."</td>";
			echo	"</tr>";
			$dem++;
		}
	}

?>