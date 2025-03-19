<?php
namespace app\Model;
    class Estoque{
    
        private $idEstoque;
        private $quantidade;
        private $emUso;
        
        function getId() {
            return $this->idEstoque;
        }
    
        function getQuantidade() {
            return $this->quantidade;
        }
        function getEmUso(){
            return $this->emUso;
        }
    
        function setId($id) {
            $this->idEstoque = $id;
        }
    
        function setQuantidade($q) {
            $this->quantidade = $q;
        }
        function setEmUso($al){
            $this->emUso = $al;
        }
    }
