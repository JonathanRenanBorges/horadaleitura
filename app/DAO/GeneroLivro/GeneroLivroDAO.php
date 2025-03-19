<?php
namespace app\DAO;
use app\Model\GeneroLivro;
use ConnectDB;
use Exception;
use PDO;
class GeneroLivroDAO
{
     public function insertGeneroLivro(GeneroLivro $ed)
     {
          try {
               $query = "INSERT INTO generolivro(fkGenero, fkLivro) VALUES (:genero, :livro)";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":genero", $ed->getFkGenero()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":livro", $ed->getFkLivro()->getId(), PDO::PARAM_INT);

               return $sql->execute();
          } catch (Exception $e) {
               print ("Erro ao inserir generolivro <hr>" . $e . "<hr>");
               DAOManager::resetAutoIncrement("generolivro");
          }
     }
     public function updateGeneroLivroByLivro($fkLivro, $fkGenero){
          $query = "UPDATE generolivro SET fkGenero = :fkGenero WHERE fkLivro = :fkLivro";
          $sql = ConnectDB::getConexao()->prepare($query);
          $sql->bindValue(":fkGenero", $fkGenero, PDO::PARAM_INT);
          $sql->bindValue(":fkLivro", $fkLivro, PDO::PARAM_INT);
          return $sql->execute();
     }
     public function getGeneroLivroByLivroId($id)
     {
          try {
               $query = "SELECT * FROM generolivro WHERE fkLivro = '$id'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\GeneroLivro');
               $select->execute();
               return $select->fetch();
 
          } catch (Exception $e) {
               print ("" . $e . "");
          }
     }
     public function deleteGeneroLivroByLivro($fk){
          try{
               $query = "DELETE FROM generolivro WHERE fkLivro = '$fk'";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->execute();
               DAOManager::resetAutoIncrement("generolivro");
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
}