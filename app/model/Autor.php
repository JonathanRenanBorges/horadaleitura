<?php
namespace app\Model;
    class Autor{
    
        private $idAutor;
        private $nome;
        
        function getId() {
            return $this->idAutor;
        }
    
        function getNome() {
            return $this->nome;
        }
    
        function setId($id) {
            $this->idAutor = $id;
        }
    
        function setNome($nome) {
            $this->nome = $nome;
        }
    }
