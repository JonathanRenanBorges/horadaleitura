<?php
namespace app\Model;
    class GeneroLiterario{
    
        private $idGeneroLiterario;
        private $genero;
        
        function getId() {
            return $this->idGeneroLiterario;
        }
    
        function getGenero() {
            return $this->genero;
        }
    
        function setId($id) {
            $this->idGeneroLiterario = $id;
        }
    
        function setGenero($nome) {
            $this->genero = $nome;
        }
    }
