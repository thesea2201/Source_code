<?php
    class Showcalendar extends CI_Controller {
public function __construct(){
        parent::__construct();
}
public function index(){
//load thư viện “calendar”
    $this->load->library('calendar'); 
//gọi sử dụng phương thức “generate” để hiện thị lịch tháng 10 năm 2014
    echo $this->calendar->generate(2014, 10);
}
      }
?> 
