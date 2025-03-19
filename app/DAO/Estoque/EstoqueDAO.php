<?php

namespace app\DAO;

use app\Model\Estoque;
use ConnectDB;
use Exception;
use PDO;

class EstoqueDAO
{
     public function insertEstoque(Estoque $ed)
     {
          try {
               $query = "INSERT INTO estoque(quantidade, emuso) VALUES (:quantidade, :alugados)";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":quantidade", $ed->getQuantidade());
               $sql->bindValue(":alugados", $ed->getEmUso());

               return $sql->execute();
          } catch (Exception $e) {
               print("Erro ao inserir estoque <hr>" . $e . "<hr>");
               DAOManager::resetAutoIncrement("estoque");
          }
     }
     public function updateEstoque(Estoque $ed){
          try {
               $query = "UPDATE estoque SET quantidade = :quantidade, emuso = :emuso WHERE idEstoque = :id";
               $sql = ConnectDB::getConexao()->prepare($query);
              
               $sql->bindValue(":id", $ed->getId());
               $sql->bindValue(":quantidade", $ed->getQuantidade());
               $sql->bindValue(":emuso", $ed->getEmUso());
               $sql->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Estoque');
               return $sql->execute();

          } catch (Exception $e){
               print("". $e . "");
          }
     }
     public function getEstoqueById($id)
     {
          try {
               $query = "SELECT * FROM estoque where idEstoque = '$id'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Estoque');
               $select->execute();
               return $select->fetch();
          } catch (Exception $e) {
               print('' . $e . '');
          }
     }
     public function deleteEstoqueById($pk)
     {
          try {
               $query = "DELETE FROM estoque WHERE idEstoque = '$pk'";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->execute();

               DAOManager::resetAutoIncrement("estoque");
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
}
