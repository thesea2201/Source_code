<?php
    class Mylibrary extends CI_Controller{
             public function showtable()
       {
      $CI =& get_instance();   
      $CI->load->library('table');
      $data = array(
        array('ID', 'Tên', 'Nơi sinh'),
        array('001', 'Nguyễn Tú', 'Bình Thuận'),
        array('002', 'Lê Văn Tùng', 'Thành Phố Hồ Chí Minh'),
        array('003', 'Lê Ngọc Lân', 'Đồng Nai')); 
        echo $this->table->generate($data);
    }  
  }
?> 
