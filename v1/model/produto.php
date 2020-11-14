<?php 
    class Produto {
        private $nome;
        private $img;
        private $qtde;
        private $preco;
        private $codigo;
        
        function set_codigo($codigo){
            $this->codigo=$codigo;
        }
        
        function set_nome($nome){
            $this->nome = $nome;
        }
        
        function set_img($img){
            $this->img = $img;
        }
        
        function set_qtde($qtde){
            $this->qtde = $qtde;
        }
        
        function set_preco($preco){
            $this->preco = $preco;
        }
        
        function get_codigo(){
            return $this->codigo;
        }
        
        function get_nome(){
            return $this->nome;
        }
        
        function get_img(){
            return $this->img;
        }
        
        function get_qtde(){
            return $this->qtde;
        }
        
        function get_preco(){
            return $this->preco;
        }
    };
?>