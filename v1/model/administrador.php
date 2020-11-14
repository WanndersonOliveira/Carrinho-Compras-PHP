<?php 
    class Administrador {
        private $adm;
        private $senha;
        
        function set_adm($adm){
            $this->adm = $adm;
        }
        
        function set_senha($senha){
            $this->senha = $senha;
        }
        
        function get_adm(){
            return $this->adm;
        }
        
        function get_senha(){
            return $this->senha;
        }
    };
?>