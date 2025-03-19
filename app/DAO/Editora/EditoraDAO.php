<?php

namespace app\DAO;

use app\Model\Editora;
use ConnectDB;
use Exception;
use PDO;

class EditoraDAO
{
     public function insertEditora(Editora $ed)
     {
          try {
               $query = "INSERT INTO editora(nome) VALUES (:nome)";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":nome", $ed->getNome());

               return $sql->execute();
          } catch (Exception $e) {
               print("Erro ao inserir editora <hr>" . $e . "<hr>");
               DAOManager::resetAutoIncrement("editora");
          }
     }
     public function getEditoraById($id)
     {
          try {
               $query = "SELECT * FROM editora where idEditora = '$id'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Editora');
               $select->execute();
               return $select->fetch();
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
     public function getOrInsertEditora($editora)
     {
          try {
               $query = "SELECT * FROM editora WHERE nome = '$editora'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, "app\Model\Editora");
               $select->execute();

               if ($select->rowCount() > 0) {
                    return $select->fetch();
               } else {
                    $editoraModel = new Editora();
                    $editoraModel->setNome($editora);
                    $this->insertEditora($editoraModel);
                    return $this->getEditoraById(ConnectDB::getConexao()->lastInsertId());
               }
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
}
