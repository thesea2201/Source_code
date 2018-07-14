<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	var $data = array();
        function  __construct() 
        {
               parent::__construct();
               $this->load->helper(array("url"));
              
 	              $this->load->model("Giaovien");
               $this->load->model("Bomon");
               
               /*$this->load->model("Album");
	       $this->load->model("Baihat");
               $this->load->library('pagination'); 
               */
               
        }
	public function index()
	{
            echo "<meta charset='UTF-8'>"; 
             
            $this->load->view('index.php');// Chua danh sach cac chuc nang

            /*$db=$this->load->database();
            $str="select * from giaovien";
            $rs=$this->db->query($str);
            foreach($rs->result() as $row)
                echo $row->TENGIAOVIEN."<br>"; 
              */  
	}
	
	
	public function giaovien()
	{
            
        $giaovien = new Giaovien();
       // $config['base_url'] = base_url('index.php/home/themgiaovien'); 
        
            /*$config['total_rows'] = $this->Casi->count_all(); 
        $config['per_page'] = 5;
        $config['uri_segment'] = 3; 
        $this->pagination->initialize($config);*/
        
          $data['gv']=$giaovien->getListObject("*","1=1"); 
          
	//$data['giaovien']=$giaovien->getListObject1(); 
                              
	  $this->load->view('viewgiaovien',$data);
         
          
        /*$data=array("ID" => "001");
        $this->load->view('viewgiaovien',$data);*/ 
        //echo base_url();     
	}       
        public function bomon()
	{
            
        $bomon = new Bomon();
        //$config['base_url'] = base_url('index.php/home/bomon'); 
        
            /*$config['total_rows'] = $this->Casi->count_all(); 
        $config['per_page'] = 5;
        $config['uri_segment'] = 3; 
        $this->pagination->initialize($config);*/
        
          $data['bomon']=$bomon->getListObject("*","1=1");
          //$data['giaovien']=$giaovien->getListObject1(); 
                              
	  $this->load->view('viewgiaovien1',$data);//hiển thị form thêm giáo viên
         
        /*$data=array("ID" => "001");
        $this->load->view('viewgiaovien',$data);*/ 
        //echo base_url();     
	}     
        
        //dung ajax 
         public function lietkebomon()
         {
            
            $bomon = new Bomon();
        
            $data['bomon']=$bomon->getListObject("*","1=1");
                              
            $this->load->view('viewbomon',$data);
        }       
        //liet ke giao vien dung Ajax 
         public function lietkegiaovien()
         {
            $giaovien = new Giaovien();
            $config['base_url'] = base_url('index.php/home/lietkegiaovien'); 
        
            /*$config['total_rows'] = $this->Casi->count_all(); 
             $config['per_page'] = 5;
              $config['uri_segment'] = 3; 
            $this->pagination->initialize($config);*/
        
            //$data['giaovien']=$giaovien->getListObject("*","1=1"); 
            //$data['giaovien']=$giaovien->getListObject1(); 
                              
            //$this->load->view('viewgiaovien1',$data);
            $ms=$_POST['maso'];
            $data['giaovien']=$giaovien->getListObject_ajax("*",$ms); 
            //$data['giaovien']=$giaovien->getListObject1(); 
             $this->load->view('viewgiaovien_ajax.php',$data);
           // echo $ms;
       
         }
        //thêm giáo viên cho bộ môn
        public function themgiaovien()
        {
           
            $config['base_url'] = base_url('index.php/home/themgiaovien'); 
            //$this->load->view("themgiaovien");
            $ma=$_POST['magv'];
            $ten=$_POST['tengv'];
            $gt=$_POST['gioitinh'];
            if($gt=='on')
                $gt=1;
            else
                $gt=0; 
            $mabomon=$_POST['mabm'];
            $giaovien = new Giaovien();
            $giaovien->set_magv($ma);
            $giaovien->set_tengv($ten);
            $giaovien->set_gioitinh($gt); 
            $giaovien->set_bomon($mabomon);
            $flag=$giaovien->save(); 
            $data= array("dung"=>$flag); 
            $this->load->view("viewthongbaothemgiaovien.php",$data);
            
        }
        public function xoa()
        {
          $this->load->view("viewxoagiaovien.php");
            
        }
        public function xoagiaovien() {
                $magv= $_POST['magv'];
                //cách 1 
                /*$giaovien=new Giaovien();
                $giaovien->set_magv($magv); 
		$giaovien->Delete1();
                */
                $this->Giaovien->Delete("MAGIAOVIEN",$magv);
               // echo $magv;
        }
        //tim giao vien theo ten 
        public function tim()
        {
          $this->load->view("viewtimgiaovien.php");
            
        }
        public function timgiaovien()
        {
            echo "<meta charset='utf-8'>";
            $tengv=$_POST['tengv'];
            
            if($this->Giaovien->Search("TENGIAOVIEN",$tengv)==true)
                     $gv = array("ketluan"=>"tìm thấy");
            else
                      $gv = array("ketluan"=>"Không thấy");
           
//            $this->load->view("ketluantim.php",$giaovien);
            $this->load->view("ketluantim.php",$gv);
           
            
            /*if($tv==true)
                echo "Tìm thấy";
            else
                echo "Tìm không thấy";
            */
        
             
            /*$data['sv'] = array( 
                    'name' => 'Linh', 
                    'ID' => '11520001', 
                    'age' => '33'); */
           /* $giaovien = new Giaovien();
            $giaovien->set_magv("H001");
            $giaovien->set_tengv("Hung Xuan");
            $giaovien->set_gioitinh(true); 
            $giaovien->set_bomon("BM01"); 
            $gv = array("ketluan"=>"tìm thấy");*/ 
//            $this->load->view("ketluantim.php",$giaovien);
//            $this->load->view("ketluantim.php",$gv);
            
        }


}