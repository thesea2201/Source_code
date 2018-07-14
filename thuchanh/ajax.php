<? php
	include "connect.php";
	$sql="select tencs from casi";
	$result = mysql_query($sql, $conn);

	echo '<form name="form-select" method="get">';
	echo '<select>'
	while($row= mysql_fetch_row($result))
	{
		echo '<option> $row[0]</option>';
	}
	echo '</select>';
	echo '</form>';
?>