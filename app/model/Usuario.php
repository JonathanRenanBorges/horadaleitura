<?php
namespace app\Model;
    class Usuario{
    
        private $idUsuario;
        private $nome;
        private $fkAcesso;
        private $fkImagemPerfil;
        private $email;
        private $senha;
        private $telefone;
        
        function getId() {
            return $this->idUsuario;
        }
    
        function getNome() {
            return $this->nome;
        }
        function getFotoPerfil(){
            return $this->fkImagemPerfil;
        }
    
        function getEmail() {
            return $this->email;
        }
        function getSenha() {
            return $this->senha;
        }
        function getTelefone() {
            return $this->telefone;
        }
    
        function getAcesso() {
            return $this->fkAcesso;
        }
    
        function setId($id) {
            $this->idUsuario = $id;
        }
    
        function setNome($nome) {
            $this->nome = $nome;
        }
        function setFotoPerfil($fk){
            $this->fkImagemPerfil = $fk;
        }
    
        function setEmail($email) {
            $this->email = $email;
        }
        function setSenha($senha) {
            $this->senha = $senha;
        }
        function setTelefone($tel) {
            $this->telefone = $tel;
        }
        function setAcesso($acesso) {
            $this->fkAcesso = $acesso;
        }
}