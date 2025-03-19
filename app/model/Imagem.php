<?php
namespace app\Model;
    class Imagem{
    
        private $idImagem;
        private $nome;
        private $tipo;
        private $data;
        private $tamanho;
        public function getId()
        {
            return $this->idImagem;
        }
        public function setId($idImagem)
        {
            $this->idImagem = $idImagem;
        }
        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getTipo()
        {
            return $this->tipo;
        }
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }
    

        public function getData()
        {
            return $this->data;
        }
        public function setData($data)
        {
            $this->data = $data;
        }
    
        public function getTamanho()
        {
            return $this->tamanho;
        }
        public function setTamanho($tamanho)
        {
            $this->tamanho = $tamanho;
        }
    }
