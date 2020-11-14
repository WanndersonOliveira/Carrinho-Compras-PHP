<?php 
    class Usuario {
        private $email;
        private $senha;
        
        function set_email($email){
            $this->email = $email;
        }
        
        function set_senha($senha){
            $this->senha = $senha;
        }
        
        function get_email(){
            return $this->email;
        }
        
        function get_senha(){
            return $this->senha;
        }
    };
?>