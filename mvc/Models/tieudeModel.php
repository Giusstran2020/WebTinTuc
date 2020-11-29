<?php 
    class tieudeModel {
        private $db;

        public function __contruct() {
            $this->db = new DB;
        }
        
     /*   public function dstieude(){
            // lấy hết ds tieu de và trả về 1 mảng
            $query = "select TieuDe from TinTuc";
            $result = mysqli_query($this->connect,$query) or die(mysqli_error());
            if(mysqli_num_rows($result)>0)
	        {
                $i = 0;
                while ($row = mysqli_fetch_array($result))
                { 

                    $kq[$i] = $row["TieuDe"];
                    $i     += 1;
                }
                return $kq;      
            }
        }
        public function check_tieude($TieuDe){
            // kiem tra coi tieu de tồn tại chưa
            $query = "SELECT TieuDe FROM TinTuc WHERE TieuDe='$TieuDe'";
            $result = mysqli_query($this->connect,$query) or die(mysqli_error());
            $kq = false;
            if (mysqli_num_rows($result) > 0){
                $kq = true;
             }
             return json_encode($kq);
        }
        public function Insert_tieude($TieuDe){
            $qr = "INSERT INTO TinTuc VALUES(null,null,null,'$TieuDe',null,null)";
            $result = false;
            if(mysqli_query($this->connect,$qr)){
                $result = true;
            }
            return json_encode($result);
         }
        public function delete_tieude($TieuDe){
            $qr = "DELETE FROM TinTuc WHERE TinTuc . TieuDe='$TieuDe'";
            $result = false;
            if(mysqli_query($this->connect,$qr)){
                $result = true;
            }
            return json_encode($result);
         }
         public function edit_tieude($TieuDe,$_TieuDe){
            $qr = "UPDATE TinTuc SET TieuDe = '$_TieuDe' WHERE  TinTuc . TieuDe='$TieuDe'";
            $result = false;
            if(mysqli_query($this->connect,$qr)){
                $result = true;
            }
            return json_encode($result);
         }
         //Phần nội dung
         public function dsTintuc(){
            // lấy hết ds trong tin tuc và trả về 1 mảng
            $query = "select * from TinTuc";
            $result = mysqli_query($this->connect,$query) or die(mysqli_error());
            if(mysqli_num_rows($result)>0)
	        {
                $i = 0;
                while ($row = mysqli_fetch_array($result))
                { 
                     $kq[$i] = array(
                        $row["TieuDe"],
                        $row["NoiDung"],
                        $row["UrlHinh"],
                    );
                    $i = $i + 1;
                }
                return $kq;      
            }
        }
        public function get_noidung($TieuDe){
            $qr = "SELECT * FROM TinTuc WHERE TinTuc . TieuDe='$TieuDe'";
            $result = mysqli_query($this->connect,$qr) or die(mysqli_error());
            if(mysqli_num_rows($result)>0)
	        {
                $i = 0;
                while ($row = mysqli_fetch_array($result))
                { 
                     $kq[$i] = array(
                        $row["TieuDe"],
                        $row["NoiDung"],
                        $row["UrlHinh"],
                    );
                    $i = $i + 1;
                }
                return $kq;      
            }
         }
        public function edit_noidung($TieuDe,$_noidung,$_hinhanh){
            // dễ gây lỗi ịnjection nên đổi kiểu sang kiểu PDO tối t3 xong
            $qr = "UPDATE TinTuc SET NoiDung = '$_noidung' , UrlHinh = '$_hinhanh' WHERE TieuDe = '$TieuDe'";
            $result = false;
            if(mysqli_query($this->connect,$qr)){
                $result = true;
            }
            return json_encode($result);
         }
         */
}
?>