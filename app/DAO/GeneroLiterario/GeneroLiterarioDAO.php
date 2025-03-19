<?php

namespace app\DAO;

use app\Model\GeneroLiterario;
use ConnectDB;
use Exception;
use PDO;

class GeneroLiterarioDAO
{
     public function insertGenero(GeneroLiterario $ed)
     {
          try {
               $query = "INSERT INTO generoliterario(genero) VALUES (:genero)";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":genero", $ed->getGenero());

               return $sql->execute();
          } catch (Exception $e) {
               print("Erro ao inserir genero <hr>" . $e . "<hr>");
               DAOManager::resetAutoIncrement("generoliterario");
          }
     }

     public function getGeneroById($id)
     {
          try {
               $query = "SELECT * FROM generoliterario WHERE idGeneroLiterario = '$id'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\GeneroLiterario');
               $select->execute();
               return $select->fetch();
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
     public function getOrInsertGeneroLiterario($genero)
     {
          try {
               $query = "SELECT * FROM generoliterario WHERE genero = '$genero'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, "app\Model\GeneroLiterario");
               $select->execute();

               if ($select->rowCount() > 0) {
                    return $select->fetch();
               } else {
                    $generoModel = new GeneroLiterario();
                    $generoModel->setGenero($genero);
                    $this->insertGenero($generoModel);
                    return $this->getGeneroById(ConnectDB::getConexao()->lastInsertId());
               }
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
}
