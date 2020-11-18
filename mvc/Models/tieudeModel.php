<?php 
    class tieudeModel extends DB{
        public function dstieude(){
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
}
?>