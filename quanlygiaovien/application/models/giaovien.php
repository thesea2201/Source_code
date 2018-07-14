<?php
class Giaovien extends CI_Model{
    private $MaGV;
    private $TenGV;
    private $GioiTinh;
    private $MaBM;
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->Oncreate();
   }
   private function Oncreate() {
       $this->MaGV="";
       $this->TenGV="";
       $this->GioiTinh=true;
       $this->MaBM="";
   }
   public function set_magv($str)
   {
       $this->MaGV=$str;
   }
   public function set_tengv($str)
   {
       $this->TenGV=$str;
   }
   public function set_gioitinh($gt)
   {
       $this->GioiTinh=$gt;
   }
   public function set_bomon($bm)
   {
       $this->MaBM=$bm;
   }
   public function getObject($strWhere) {
        $this->Oncreate();
        $this->db->where($strWhere, NULL, FALSE);
        $query = $this->db->get("giaovien");
        $ar = $query->row_array();
        if (!empty($ar)) {
            $this->MaGV = $ar["MAGIAOVIEN"];
            $this->TenGV = $ar["TENGIAOVIEN"];
            $this->GioiTinh=$ar["GIOITINH"];
        }
   } 
   
   public function getListObject($strFieldName = NULL, $strWhere = NULL) {
       
	   if (!is_null($strWhere)) {
            $this->db->where($strWhere, NULL, FALSE);
        } 
       if (!is_null($strFieldName)) {
            $this->db->select($strFieldName);
        }
        $query = $this->db->get("giaovien");
        return $query->result_object();
   }
   
   public function getListObject_ajax($strFieldName, $strWhere) {
       if(!is_null($strWhere))
       $this->db->where("MABOMON",$strWhere);
        $query = $this->db->get("giaovien");
        return $query->result_object();
   }
    
   public function getListObject1()
   {
         $str="select * from giaovien";
         $rs=$this->db->query($str);
         return $rs; 
            
   }
            
   public function Save() {
        $data = array("MAGIAOVIEN" => $this->MaGV,"TENGIAOVIEN" => $this->TenGV,"GIOITINH"=>$this->GioiTinh, "MABOMON"=>$this->MaBM);
        //$this->db->insert("giaovien", $data);
        if($this->db->insert("giaovien", $data)==true)
                return 1;
        else return 0; 
        
   }
   public function Save_1() {
       $str="insert into giaovien values('$this->MaGV','$this->TenGV','$this->GioiTinh','$this->MaBM')";
       $this->db->query($str);
       
    }
    public function Delete($nameField= NULL, $value) {
        if (!is_null($nameField)) {
            $this->db->where($nameField, $value);
            $this->db->delete("giaovien");
        }        
    }
    public function Delete1() {
        $str="delete from giaovien where MAGIAOVIEN='$this->MaGV'";
        $this->db->query($str);
                
    }
    public function Search($nameField, $value)
    {
        $this->db->where($nameField,$value);
        $query = $this->db->get('giaovien');
        
        if($query->num_rows() >= 1){
            return true;
        }
        else 
            return false; 
        
    }
    
    /*public function getListObject($strFieldName = NULL, $strWhere = NULL,$number=NULL,$offset=NULL) {
        if (!is_null($strFieldName)) {
            $this->db->select($strFieldName);
        }
        if (!is_null($strWhere)) {
            $this->db->where($strWhere, NULL, FALSE);
        }
        $query = $this->db->get("giaovien",$number,$offset);
        return $query->result_object();
    }*/

}   
?>
