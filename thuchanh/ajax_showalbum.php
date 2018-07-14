<?php
	include "connect.php";
	$macs = $_GET["macs"];
	$sql = "select * from album where macs = '$macs'";
	$result = $conn -> query($sql);
	if(mysqli_num_rows($result) > 0)
	{
		echo "<table border='1'>";
		echo "<tr><th>STT </th> <th> Ma album</th><th> Ten album</th></tr>";
		$dem =1;
		while($row = $result-> fetch_array())
		{

			echo "<tr>";
			echo 	"<td>".$dem."</td>";
			echo 	"<td>".$row["maab"]."</td>";
			echo 	"<td>".$row["tenab"]."</td>";
			echo "</tr>";
			$dem ++;
		}
		echo "</table>";	
	}
	
?>