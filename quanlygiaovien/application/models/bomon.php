<?php
class Bomon extends CI_Model{
    private $MaBM;
    private $TenBM;
    private $MaKH;
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->Oncreate();
   }
   private function Oncreate() {
       $this->MaBM="";
       $this->MaKH="";
       $this->TenBM="true";
   }
   public function getListObject($strFieldName = NULL, $strWhere = NULL) {
       if (!is_null($strWhere)) {
            $this->db->where($strWhere, NULL, FALSE);
        } 
       if (!is_null($strFieldName)) {
            $this->db->select($strFieldName);
        }
        $query = $this->db->get("bomon");
        return $query->result_object();
   }
}   
?>
