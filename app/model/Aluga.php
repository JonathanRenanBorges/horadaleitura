<?php

namespace app\Model;
    class Aluga{
    
        private $fkUsuario;
        private $fkLivro;
        private $dataRetirada;
        private $dataDevolucao;
        private $valor;
        private $juros;
        function getLivro() {
            return $this->fkLivro;
        }
    
        function getUsuario() {
            return $this->fkUsuario;
        }
        function getRetirada() {
            return $this->dataRetirada;
        }
    
        function getDevolucao() {
            return $this->dataDevolucao;
        }
        function getValor() {
            return $this->valor;
        }
    
        function getJuros() {
            return $this->juros;
        }
    
        function setLivro($livro) {
            $this->fkLivro = $livro;
        }
    
        function setUsuario($usuario) {
            $this->fkUsuario = $usuario;
        }
        function setRetirada($retirada) {
            $this->dataRetirada = $retirada;
        }
    
        function setDevolucao($devolucao) {
            $this->dataDevolucao = $devolucao;
        }
        function setValor($valor) {
            $this->valor = $valor;
        }
    
        function setJuros($juros) {
            $this->juros = $juros;
        }
    }
