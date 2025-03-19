<?php
namespace app\DAO;
use app\Model\Imagem;
use ConnectDB;
use Exception;
use PDO;
class ImagemDAO{
    public function insertImagem(Imagem $imagem){
         try {
              $query = "INSERT INTO imagem(nome,tipo,tamanho) VALUES (:nome,:tipo,:tamanho)";
              $sql = ConnectDB::getConexao()->prepare($query);
              $sql->bindValue(":nome",$imagem->getNome());
              $sql->bindValue(":tipo",$imagem->getTipo());
              $sql->bindValue(":tamanho",$imagem->getTamanho());
              
              return $sql->execute();
         } catch (Exception $e){
              print("Erro ao inserir imagem <hr>" . $e . "<hr>");
              $sql = ConnectDB::getConexao()->prepare("ALTER TABLE imagem SET AUTO INCREMENT = 0;");
         }
    }

    public function getImagemById($id)
    {
         try {
              $query = "SELECT * FROM imagem WHERE idImagem = '$id'";
              $select = ConnectDB::getConexao()->prepare($query);
              $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Imagem');
              $select->execute();
              return $select->fetch();

         } catch (Exception $e) {
              print ("" . $e . "");
         }
    }
    public function deleteImagemById($pk){
     try {
          if($pk > 1){
               $query = "DELETE FROM imagem WHERE idImagem = '$pk'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->execute();
               DAOManager::resetAutoIncrement("imagem");
          }
     } catch (Exception $e){
          print ("" . $e . "");
     }
    }
}
