<?php 
    class home extends Controller{
        function SayHi(){
            $this->view("home", [
                "pages" => "home"
            ]);
        }
    }
?>