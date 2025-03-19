<?php
namespace app\DAO;
use app\Model\Usuario;
use ConnectDB;
use Exception;
use PDO;
class UsuarioDAO
{
     public function insertUser(Usuario $user)
     {
          try {
               $query = "INSERT INTO usuario(nome,email,senha,telefone,fkAcesso, fkFotoPerfil) VALUES (:nome,:email,:senha,:telefone,:fkAcesso, :fkFotoPerfil)";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":nome", $user->getNome());
               $sql->bindValue(":email", $user->getEmail());
               $sql->bindValue(":senha", $user->getSenha());
               $sql->bindValue(":telefone", $user->getTelefone());
               $sql->bindValue(":fkAcesso", $user->getAcesso());
               $sql->bindValue(":fkFotoPerfil", $user->getFotoPerfil() ?: 1);
               return $sql->execute();
          } catch (Exception $e) {
               print ("Erro ao inserir usuário <hr>" . $e . "<hr>");
               DAOManager::resetAutoIncrement("usuario");
          }
     }
     public function getUserById($pk)
     {
          try {
               $query = "SELECT * FROM usuario WHERE idUsuario = '$pk'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Usuario');
               $select->execute();
               return $select->fetch();
          } catch (Exception $e) {
               echo ("" . $e . "");
          }
     }
     public function getUserByEmail($em)
     {
          try {
               $query = "SELECT * FROM usuario WHERE email = '$em'";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Usuario');
               $sql->execute();
               return $sql->fetch();
          } catch (Exception $e) {
               echo ("" . $e . "");
          }
     }
     public function updateUser(Usuario $user){
          try {
               $query = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, fkAcesso = :fkAcesso, fkImagemPerfil = :fkFotoPerfil WHERE idUsuario = :id";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":id", $user->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkAcesso", $user->getAcesso(), PDO::PARAM_INT);
               $sql->bindValue(":fkFotoPerfil", $user->getFotoPerfil()->getId() ?: 1, PDO::PARAM_INT);
               $sql->bindValue(":nome", $user->getNome());
               $sql->bindValue(":email", $user->getEmail());
               $sql->bindValue(":senha", $user->getSenha());
               $sql->bindValue(":telefone", $user->getTelefone());

               return $sql->execute();
          } catch (Exception $e) {
               print ("Erro ao atualizar usuário <hr>" . $e . "<hr>");
          }
     }
}
?>