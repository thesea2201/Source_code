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
         $base_url = base_url('index.php/home/timgiaovien'); 
        ?>
       
    <form method="POST" action="<?php echo $base_url;?>" >
        Tên giáo viên: <input type="text" name ="tengv"><br>
        <input type="submit" value ="Tìm">
    </form>    
    </body>
</html>
