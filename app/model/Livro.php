<?php
namespace app\Model;
    class Livro
    {

        private $idLivro;
        private $fkAutor;
        private $fkImagem;
        private $fkClassificacao;
        private $fkEditora;
        private $fkEstoque;
        private $titulo;
        private $descricao;
        private $paginas;
        private $edicao;
        private $lancamento; 
        private $fkGeneroLivro;
        private $isbn;

        function getId()
        {
            return $this->idLivro;
        }
        function getIsbn(){
            return $this->isbn;
        }

        function getImagem()
        {
            return $this->fkImagem;
        }

        function getTitulo()
        {
            return $this->titulo;
        }
        function getDescricao(){
            return $this->descricao;
        }

        function getPaginas()
        {
            return $this->paginas;
        }


        function getEdicao()
        {
            return $this->edicao;
        }

        function getLancamento()
        {
            return $this->lancamento;
        }

        function getAutor()
        {
            return $this->fkAutor;
        }

        function getClassificacao()
        {
            return $this->fkClassificacao;
        }

        function getEditora()
        {
            return $this->fkEditora;
        }

        function getEstoque()
        {
            return $this->fkEstoque;
        }
        function getGeneroLivro(){
            return $this->fkGeneroLivro;
        }
        function setId($id)
        {
            $this->idLivro = $id;
        }

        function setTitulo($nome)
        {
            $this->titulo = $nome;
        }
        function setIsbn($isbn){
            $this->isbn = $isbn;
        }
        function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        function setPaginas($pg)
        {
            $this->paginas = $pg;
        }
        function setEdicao($ed)
        {
            $this->edicao = $ed;
        }

        function setImagem($img)
        {
            $this->fkImagem = $img;
        }
        function setAutor($fkAutor){
            $this->fkAutor = $fkAutor;
        }
        function setEditora($fkEditora){
            $this->fkEditora = $fkEditora;
        }
        function setEstoque($fkEstoque){
            $this->fkEstoque = $fkEstoque;
        }
        function setLancamento($lan){
            $this->lancamento = $lan;
        }
        function setClassificacao($cl){
            $this->fkClassificacao = $cl;
        }
        function setGeneroLivro($gn){
            $this->fkGeneroLivro = $gn;
        }
    }