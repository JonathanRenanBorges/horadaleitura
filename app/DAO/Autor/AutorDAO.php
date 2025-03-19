<?php

namespace app\DAO;

use app\Model\Autor;
use ConnectDB;
use Exception;
use PDO;
$teste;
class AutorDAO
{
     public function insertAutor(Autor $au)
     {
          try {
               $query = "INSERT INTO autor(nome) VALUES (:nome)";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":nome", $au->getNome());

               return $sql->execute();
          } catch (Exception $e) {
               print("Erro ao inserir autor <hr>" . $e . "<hr>");
               DAOManager::resetAutoIncrement("autor");
          }
     }
     public function getAutorById($id)
     {
          try {
               $query = "SELECT * FROM autor where idAutor = '$id'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Autor');
               $select->execute();
               return $select->fetch();
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
     public function getOrInsertAutor($autor)
     {
          try {
               $query = "SELECT * FROM autor WHERE nome = '$autor'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, "app\Model\Autor");
               $select->execute();

               if ($select->rowCount() > 0) {
                    return $select->fetch();
               } else {
                    $autorModel = new Autor();
                    $autorModel->setNome($autor);
                    $this->insertAutor($autorModel);
                    return $this->getAutorById(ConnectDB::getConexao()->lastInsertId());
               }
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
}
