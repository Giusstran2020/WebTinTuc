<?php
    class DB{
        public $connect;
        protected $server = "localhost";
        protected $user = "root";
        protected $password = "";
        protected $dbname = "test_lab03"; // tên csdl 

        function __construct(){
            $this->connect = mysqli_connect ($this->server,$this->user,$this->password,$this->dbname) or die ('ket noi that bai');
            mysqli_select_db($this->connect,$this->dbname);
            mysqli_query($this->connect,"SET NAMES UTF8");
        }
    }
?>