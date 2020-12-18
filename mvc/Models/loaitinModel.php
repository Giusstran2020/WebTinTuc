<?php 
    class loaitinModel{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function dsloaitin(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM newstype");

            $result = $this->db->resultSet();

            return $result;
        }
        
    }
?>