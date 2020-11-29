<?php 

    class usersModel{
        private $db;

        public function __construct() {
            $this->db = new DB;
        }
        public function getUsers(){
            $this->db->query("SELECT * FROM Users order by username asc");

            $result = $this->db->resultSet();

            return $result;
        }
        //check_user
        public function check_user($username){
            // kiem tra coi user tồn tại chưa
            $this->db->query("SELECT username FROM Users WHERE username = '$username'");
            
            $result = $this->db->resultSet();
            
            $data_exists = ($result == null) ? true : false;

            return $data_exists;

        }
        // Insert User
        public function insertUser($fullname,$username,$password,$email,$level){
            $this->db->query("INSERT INTO Users VALUES(null,'$username','$password','$level','$fullname','$email')");
         
            $result = $this->db->execute();
        
            return  $result;
 
         }
        // get info 1 user
        public function GetInfoUser($username){
            $this->db->query("SELECT * FROM Users WHERE username = '$username'");
            
            $result = $this->db->resultSet();

            return $result;
        }
        //  delete info 1 user
        public function deleteUser($username){
            $this->db->query("DELETE FROM Users WHERE username='$username'");
            
            $result = $this->db->execute();

            if(isset($result)){
                return true;
            }
            return false;
         }
        // update info 1 user
        public function updatetUser($fullname,$username,$password,$email,$level){
            $this->db->query("UPDATE Users SET  password = '$password', level = '$level', hoten = '$fullname', email = '$email' WHERE Users . username = '$username'");
         
            $result = $this->db->execute();
        
            return  $result;
        }
        
        
        /*
        public function Check_Login($username,$password){
            $query = "SELECT username, password FROM admin WHERE username='$username'";
            $result = mysqli_query($this->connect,$query) or die(mysqli_error());
            $kq = false;
            if (mysqli_num_rows($result) == 0){
                $kq = false;
                // ktra ten
                echo "sai ten";
            }
            else {
                $row = mysqli_fetch_array($result);
                if ($password == $row['password']){
                    $kq = true;   
                }
            }
             return json_encode($kq);
        }
        public function Get_level(){
            // kiem tra coi user là level gi để đưa vào quản trị tương ứng
        }
        public function dsUser(){
            // lấy hết ds user và trả về 1 mảng
            $query = "select * from Users order by username asc";
            $result = mysqli_query($this->connect,$query) or die(mysqli_error());
            if(mysqli_num_rows($result)>0)
	        {
                $i = 0;
                while ($row = mysqli_fetch_array($result))
                { 
                    
                    $kq[$i] = array(
                        $row["username"],
                        $row["hoten"],
                        $row["email"],
                        $row["level"],
                    );
                    $i = $i + 1;
                }
                
                return $kq;      
            }
        }
        public function check_user($username){
            // kiem tra coi user tồn tại chưa
            $query = "SELECT username FROM Users WHERE username='$username'";
            $result = mysqli_query($this->connect,$query) or die(mysqli_error());
            $kq = false;
            if (mysqli_num_rows($result) > 0){
                $kq = true;
             }
             return json_encode($kq);
        }
        public function Insert_user($fullname,$username,$password,$email,$level){
            $qr = "INSERT INTO Users VALUES(null,'$username','$password','$level','$fullname','$email')";
            $result = false;
            if(mysqli_query($this->connect,$qr)){
                $result = true;
            }
            return json_encode($result);
 
         }
*/
        
}
?>