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
        <?php
         $config['base_url'] = base_url('index.php/home/themgiaovien'); 
        ?>
        <form method="POST" action="index.php/home/themgiaovien">
        Tên: <input type="text" name="magv"></input> <br>
        Mã số: <input type="text" name="tengv"></input><br> 
        Giới tính: <input type="checkbox" name="gioitinh" checked></input><br>  
        Bộ môn: <select name='mabm'>
        </select>
        <br>
        <input type="submit" value ="Thêm"> 
        </form>
    </body>
</html>
