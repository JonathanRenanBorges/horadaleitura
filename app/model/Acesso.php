<?php

namespace app\Model;
    class Acesso{  
        private $idAcesso;
        private $nivelAcesso;
        private $nome;
        function getId() {
            return $this->idAcesso;
        }
    
        function getNivel() {
            return $this->nivelAcesso;
        }
    
        function getNome() {
            return $this->nome;
        }
    
        function setId($id) {
            $this->idAcesso = $id;
        }
    
        function setNome($nome) {
            $this->nome = $nome;
        }
    
        function setAcesso($nivel) {
            $this->nivelAcesso = $nivel;
        }
}