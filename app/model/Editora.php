<?php
namespace app\Model;
    class Editora{
    
        private $idEditora;
        private $nome;
        
        function getId() {
            return $this->idEditora;
        }
    
        function getNome() {
            return $this->nome;
        }
    
        function setId($id) {
            $this->idEditora = $id;
        }
    
        function setNome($nome) {
            $this->nome = $nome;
        }
    }
