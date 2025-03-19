<?php
namespace app\Model;
    class Classificacao{
    
        private $idClassificacaoIndicativa;
        private $classificacao;
        private $descricao;
        
        function getId() {
            return $this->idClassificacaoIndicativa;
        }
    
        function getClassificacao() {
            return $this->classificacao;
        }
    
        function getDescricao() {
            return $this->descricao;
        }
    
        function setId($id) {
            $this->idClassificacaoIndicativa = $id;
        }
    
        function setClassificacao($cl) {
            $this->classificacao = $cl;
        }
    
        function setDescricao($des) {
            $this->descricao = $des;
        }
    }