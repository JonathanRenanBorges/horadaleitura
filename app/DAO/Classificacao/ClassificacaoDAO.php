<?php
namespace app\DAO;
use app\Model\Classificacao;
use ConnectDB;
use Exception;
use PDO;
class ClassificacaoDAO{
    public function getClassificacaoById($id)
    {
         try {
              $query = "SELECT * FROM classificacaoindicativa WHERE idClassificacaoIndicativa = '$id'";
              $select = ConnectDB::getConexao()->prepare($query);
              $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Classificacao');
              $select->execute();
              return $select->fetch();

         } catch (Exception $e) {
              print ("" . $e . "");
         }
    }
    
    public function getClassificacaoByDescricao($des)
    {
         try {
              $query = "SELECT * FROM classificacaoindicativa WHERE classificacao = '$des'";
              $select = ConnectDB::getConexao()->prepare($query);
              $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Classificacao');
              $select->execute();
              return $select->fetch();

         } catch (Exception $e) {
              print ("" . $e . "");
         }
    }

}
