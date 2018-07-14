
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         class Usinglibrary extends CI_Controller {
            public function index(){
            $this->load->library("mylibrary"); 
            echo $this->mylibrary->showtable();     
            }
          }
        ?>
      </body>
</html>
