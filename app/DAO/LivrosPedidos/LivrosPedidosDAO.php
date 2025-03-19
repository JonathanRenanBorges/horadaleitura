<?php

namespace app\DAO;

use app\Model\Livro;
use app\DAO\LivroDAO as LivroDAO;
use app\Model\LivrosEmUso;
use app\Model\LivrosPedidos;
use ConnectDB;
use Exception;
use PDO;

class LivrosPedidosDAO
{
     public function insertLivrosPedidos(LivrosPedidos $livro)
     {
          try {
               $query = "INSERT INTO livrospedidos(fkLivro,fkUsuario,dataPedido,dataRetirada,dataDevolucao, isEmUso) VALUES (:fkLivro,:fkUsuario,:dataPedido,:dataRetirada,:dataDevolucao, :isEmUso)";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":fkLivro", $livro->getFkLivro()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkUsuario", $livro->getFkUsuario()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":dataPedido", $livro->getDataPedido());
               $sql->bindValue(":dataRetirada", $livro->getDataRetirada());
               $sql->bindValue(":dataDevolucao", $livro->getDataDevolucao());
               $sql->bindValue(":isEmUso", $livro->getIsEmUso());
               return $sql->execute();
          } catch (Exception $e) {
               print ("Erro ao inserir livro <hr>" . $e . "<hr>");
               DAOManager::resetAutoIncrement("livrospedidos");
          }
     }
     public function updateLivrosPedidos(LivrosPedidos $livro)
     {
          try {
               $query = "UPDATE livrospedidos SET fkLivro = :fkLivro, fkUsuario = :fkUsuario, dataPedido = :dataPedido,dataRetirada = :dataRetirada,dataDevolucao = :dataDevolucao, isEmUso = :isEmUso WHERE idlivrosPedidos = :id;";
               $sql = ConnectDB::getConexao()->prepare($query);
              
               $sql->bindValue(":id", $livro->getId());
               $sql->bindValue(":fkLivro", $livro->getFkLivro(), PDO::PARAM_INT);
               $sql->bindValue(":fkUsuario", $livro->getFkUsuario(), PDO::PARAM_INT);
               $sql->bindValue(":dataPedido", $livro->getDataPedido());
               $sql->bindValue(":dataRetirada", $livro->getDataRetirada());
               $sql->bindValue(":dataDevolucao", $livro->getDataDevolucao());
               $sql->bindValue(":isEmUso", $livro->getIsEmUso());
     
               return $sql->execute();
          } catch (Exception $e) {
               print("Erro ao alterar livro <hr> " . $e . "<hr>");
          }
     }
     public function getLivroPedidoById($id)
     {
          try {
               $query = "SELECT * FROM livrospedidos WHERE idlivrosPedidos = '$id'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\LivrosPedidos');
               $select->execute();
               return $select->fetch();
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
     public function getLivroPedidoByLivroId($id)
     {
          try {
               $query = "SELECT * FROM livrospedidos WHERE fkLivro = $id";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\LivrosPedidos');
               $select->execute();
               echo($id);
               return $select->fetch();
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }

     public function deleteLivroPedido($pk)
     {
          try {
               $livro = self::getLivroPedidoById($pk);
               print ($pk . "<hr>");
               print_r($livro);
               $query = "DELETE FROM livrospedidos WHERE idlivrosPedidos = '$pk'";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->execute();
               DAOManager::resetAutoIncrement("livrospedidos");
          } catch (Exception $e) {
               print ($e);
          }

     }
}
