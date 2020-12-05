<?php 
    class theloaiModel{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function dstheloai(){
            // lấy hết ds tieu de và trả về 1 mảng
            $this->db->query("SELECT * FROM type");

            $result = $this->db->resultSet();

            return $result;
        }
        //Check the loai
        public function check_theloai($theloai){
            // kiem tra the loai tồn tại chưa
            $this->db->query("SELECT TypeName FROM type WHERE TypeName = '$theloai'");
            
            $result = $this->db->resultSet();
            
            $data_exists = ($result == null) ? true : false;

            return $data_exists;

        }
        public function Insert_theloai($theloai,$STT,$anhien){
            $this->db->query("INSERT INTO type VALUES(null,'$theloai','$STT','$anhien')");
         
            $result = $this->db->execute();
        
            return  $result;
 
         }
         //  delete 1 the loai
        public function delete_theloai($IdType){
            $this->db->query("DELETE FROM type WHERE IdType ='$IdType'");
            
            $result = $this->db->execute();

            if(isset($result)){
                return true;
            }
            return false;
         }
         // get info 1 the loai
        public function GetInfotheloai($IdType){
            $this->db->query("SELECT * FROM type WHERE Idtype = '$IdType'");
            
            $result = $this->db->resultSet();

            return $result;
        }
         // update info 1 the loai
         public function update_theloai($IdType,$_theloai,$STT,$anhien){
            $this->db->query("UPDATE type SET TypeName = '$_theloai', TypeNumber = '$STT', TypeAppear = '$anhien' WHERE  IdType = '$IdType'");

            $result = $this->db->execute();
        
            return  $result;
        }
}
?>