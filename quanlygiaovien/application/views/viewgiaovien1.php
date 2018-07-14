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
        <form method="POST" id="add_form" action="http://localhost/giaotrinh/quanlygiaovien/index.php/home/themgiaovien">
           Tên: <input type="text" name="tengv" id="tengv"></input> <br>
           Mã số: <input type="text" name="magv" id="magv"></input><br> 
           Giới tính <input type="checkbox" name="gioitinh" checked></input><br> 
           Bộ môn: <select name="mabm" id="mabm">
               
          <?php
               foreach($bomon as $value)
               {
                  echo "<option value='$value->MABOMON'>".$value->TENBOMON."</option>";
                  
               }
             ?> 
           </select>
        <br>
        <input type="submit" value ="Thêm"> 
        </form> 
        </article>
    </body>
</html>
