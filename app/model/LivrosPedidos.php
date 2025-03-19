<?php

namespace app\Model;

class LivrosPedidos
{

    private $idlivrosPedidos;
    private $fkLivro;
    private $fkUsuario;
    private $dataPedido;
    private $dataRetirada;
    private $dataDevolucao;
    private $isEmUso;
    public function getId()
    {
        return $this->idlivrosPedidos;
    }
    public function getIsEmUso(){
        return $this->isEmUso;
    }

    public function getFkLivro()
    {
        return $this->fkLivro;
    }

    public function getFkUsuario()
    {
        return $this->fkUsuario;
    }

    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    public function getDataRetirada()
    {
        return $this->dataRetirada;
    }

    public function getDataDevolucao()
    {
        return $this->dataDevolucao;
    }
    public function setId($idLivrosPedidos)
    {
        $this->idlivrosPedidos = $idLivrosPedidos;
    }

    public function setFkLivro($fkLivro)
    {
        $this->fkLivro = $fkLivro;
    }
    public function setIsEmUso($is){
        $this->isEmUso = $is;
    }

    public function setFkUsuario($fkUsuario)
    {
        $this->fkUsuario = $fkUsuario;
    }

    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;
    }

    public function setDataRetirada($dataRetirada)
    {
        $this->dataRetirada = $dataRetirada;
    }

    public function setDataDevolucao($dataDevolucao)
    {
        $this->dataDevolucao = $dataDevolucao;
    }
}
