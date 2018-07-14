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
            
   public function Save() {
        $data = array("MAGIAOVIEN" => $this->MaGV,"TENGIAOVIEN" => $this->TenGV,"GIOITINH"=>$this->GioiTinh, "MABOMON"=>$this->MaBM);
        $this->db->insert("giaovien", $data);
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
    public function Search($nameField, $value)
    {
        $this->db->where($nameField,$value);
        $query = $this->db->get('giaovien');
        
        if($query->num_rows() == 1){
            return true;
        }
        else 
            return false; 
    }
 
}   
?>
