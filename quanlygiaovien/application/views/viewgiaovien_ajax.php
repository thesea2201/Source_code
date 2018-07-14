<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <article id="grid">
        <form method="POST" id="add_form" action="">
           Danh sách các giáo viên:<br>
           <table border="1">
           <tr>
               <th>Mã giáo viên</th>
               <th>Tên giáo viên</th>
            </tr>
          <?php
               foreach($giaovien as $value)
               {
                  echo "<tr>";
                  echo "<td>".$value->MAGIAOVIEN."</td>";
                  echo "<td>".$value->TENGIAOVIEN."</td>";
                  echo "</tr>";
               }
             ?> 
           </table>
        <br>
        </article>
        <article>
            <div id="iddiv"></div> 
        </article>
    </body>
</html>
