<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head>
    <body>
        <h3 class="test">Danh sách các giáo viên 2018 </h3>
       <table id="giaovien_list" border='1'> 
	<tr>
            <th>STT</th>        
            <th>Mã giáo viên</th>
            <th>Tên giáo viên</th>
            <th>giới tính</th>
	</tr>
	<?php
             $stt=0;
             foreach($gv as $value)
             {
                 $stt++;
                 echo "<tr id=".$value->MAGIAOVIEN.">";
                 echo "<td>".$stt."</td>";
                 echo "<td>".$value->MAGIAOVIEN."</td>";
                 echo "<td>".$value->TENGIAOVIEN."</td>";
                 if($value->GIOITINH==1)
                    echo "<td>"."Nam"."</td>";
                 else
                     echo "<td>"."Nữ"."</td>";
                 echo "</tr>";
             }
                                           /*cach 2 
                                            * foreach($giaovien->result() as $row)
                                                echo $row->TENGIAOVIEN."<br>"; 
                                            */ 
             ?>
	</table>
    </body>
</html>
