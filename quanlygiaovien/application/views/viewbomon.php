<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
      <script type="text/javascript" src="<?php echo base_url('public/js/jquery-1.10.2.min.js');?>"></script>
       <script type="text/javascript" src="<?php echo base_url('public/js/script.js');?>"></script>
       <script type="text/javascript">
           
           $(document).ready(function() {
               $("#mabm").change(function(){
                   var mabomon=$("#mabm").val();
                   $.post("<?php echo base_url('index.php/home/lietkegiaovien');?>",
                    {
                        maso:mabomon
                    },
                    function(data,status){
                        if(status=="success")
                        {
                            $("#iddiv").html(data);  
                        }
                     });
                   //alert("test thui mà");
               }); 
           });      
       </script>
    </head>
    <body>
        <article id="grid">
        <form method="POST" id="add_form" action="">
           Bộ môn: <select name="mabm" id="mabm">
          <?php
               foreach($bomon as $value)
               {
                  echo "<option value='$value->MABOMON'>".$value->TENBOMON."</option>";
                  
               }
             ?> 
           </select>
        <br>
        </article>
        <article>
            <div id="iddiv"></div> 
        </article>
    </body>
</html>
