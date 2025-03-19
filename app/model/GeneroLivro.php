<?php
namespace app\Model;
    class GeneroLivro{
    
        private $fkGenero;
        private $fkLivro;
        
        function getFkGenero() {
            return $this->fkGenero;
        }
    
        function getFkLivro() {
            return $this->fkLivro;
        }
    
        function setFkGenero($id) {
            $this->fkGenero = $id;
        }
    
        function setFkLivro($id) {
            $this->fkLivro = $id;
        }
    }
