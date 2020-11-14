<?php 
    class Conta{
        private $agencia;
        private $operacao;
        private $conta;
        private $banco;
        private $credito;
        private $senha;
        
        function __construct(){
            $this->credito = 0;
            $this->agencia = "";
            $this->conta = "";
            $this->banco = "";
            $this->senha = "";
        }
        
        /*function __construct($agencia, $conta, $banco, $senha){
            $this->credito = 0;
            $this->agencia = $agencia;
            $this->conta = $conta;
            $this->banco = $banco;
            $this->senha = $senha;
        }*/
        
        function set_agencia($agencia){
            $this->agencia = $agencia;
        }
        
        function set_conta($conta){
            $this->conta = $conta;
        }
        
        function set_banco($banco){
            $this->banco = $banco;
        }
        
        function set_credito($credito){
            $this->credito = $credito;
        }
        
        function set_senha($senha){
            $this->senha = $senha;
        }
        
        function set_operacao($operacao){
            $this->operacao = $operacao;
        }
        
        function get_agencia(){
            return $this->agencia;
        }
        
        function get_operacao(){
            return $this->operacao;
        }
        
        function get_conta(){
            return $this->conta;
        }
        
        function get_banco(){
            return $this->banco;
        }
        
        function get_credito(){
            return $this->credito;
        }
        
        function get_senha(){
            return $this->senha;
        }
        
        function check_senha($senha){
            $check = false;
            
            if($this->senha == $senha){
                $check = true;
            }
            
            return $check;
        }
    };

?>