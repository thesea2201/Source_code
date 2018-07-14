<? php
	include "connect.php";
	$macs =$_GET['macs'];
	alert($macs);
	$sql = "SELECT * FROM ALBUM WHERE";
	$rs = $conn->query($sql);
	if(mysqli_num_rows($result) > 0)
	{
		echo "<table border="1">";
		echo "<tr><th>STT </th> <th> Ma album</th><th> Ten album</th></tr>";
		$dem =1;
		while($row = $rs-> fetch_array())
		{

			echo "<tr>";
			echo "<td>".$dem."</td>";
			echo 	"<td>".$row["maab"]."</td>";
			echo 	"<td>".$row["tenab"]."</td>";
			echo "</tr>";
			$dem ++;
		}
		echo "</table>";	
	}
	
?>