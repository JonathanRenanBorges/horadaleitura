<?php

namespace app\DAO;

use app\Model\Livro;
use app\DAO\GeneroLivroDAO as GeneroLivroDAO;
use ConnectDB;
use Exception;
use PDO;

class LivroDAO
{
     public function insertLivro(Livro $livro)
     {
          try {
               $query = "INSERT INTO livro(fkAutor,fkImagem,fkClassificacao,fkEditora,fkEstoque,titulo,descricao,paginas,edicao,lancamento, isbn) VALUES (:fkAutor,:fkImagem,:fkClassificacao,:fkEditora,:fkEstoque, :titulo, :descricao,:paginas,:edicao,:lancamento, isbn)";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":fkAutor", $livro->getAutor()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkImagem", $livro->getImagem()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkClassificacao", $livro->getClassificacao()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkEditora", $livro->getEditora()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkEstoque", $livro->getEstoque()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":titulo", $livro->getTitulo());
               $sql->bindValue(":descricao", $livro->getDescricao());
               $sql->bindValue(":paginas", $livro->getPaginas());
               $sql->bindValue(":edicao", $livro->getEdicao());
               $sql->bindValue(":lancamento", $livro->getLancamento());
               $sql->bindValue(":isbn", $livro->getIsbn());
               return $sql->execute();
          } catch (Exception $e) {
               print("Erro ao inserir livro <hr>" . $e . "<hr>");
               DAOManager::resetAutoIncrement("livro");
          }
     }
     public function updateLivro(Livro $livro)
     {
          try {
               $query = "UPDATE livro SET fkAutor = :fkAutor, fkImagem = :fkImagem, fkClassificacao = :fkClassificacao,fkEditora = :fkEditora,titulo = :titulo, descricao = :descricao,paginas = :paginas,edicao = :edicao,lancamento = :lancamento, isbn = :isbn WHERE idLivro = :idLivro;";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->bindValue(":idLivro", $livro->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkAutor", $livro->getAutor()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkImagem", $livro->getImagem()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkClassificacao", $livro->getClassificacao()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":fkEditora", $livro->getEditora()->getId(), PDO::PARAM_INT);
               $sql->bindValue(":titulo", $livro->getTitulo());
               $sql->bindValue(":descricao", $livro->getDescricao());
               $sql->bindValue(":paginas", $livro->getPaginas());
               $sql->bindValue(":edicao", $livro->getEdicao());
               $sql->bindValue(":lancamento", $livro->getLancamento());
               $sql->bindValue(":isbn", $livro->getIsbn());

               
               return $sql->execute();
          } catch (Exception $e) {
               print("Erro ao alterar livro <hr> " . $e . "<hr>");
          }
     }
     public function getLivroById($id)
     {
          try {
               $query = "SELECT * FROM livro WHERE idLivro = '$id'";
               $select = ConnectDB::getConexao()->prepare($query);
               $select->setFetchMode(PDO::FETCH_CLASS, 'app\Model\Livro');
               $select->execute();
               return $select->fetch();
          } catch (Exception $e) {
               print("" . $e . "");
          }
     }
     public function deleteLivro($pk)
     {
          try {
               $generoLivroDAO = new GeneroLivroDAO();
               $generoLivroDAO->deleteGeneroLivroByLivro($pk);
               $estoqueLivroDAO = new EstoqueDAO();
               $livro = self::getLivroById($pk);
               print($pk . "<hr>");
               print_r($livro);
               $estoque = $estoqueLivroDAO->getEstoqueById($livro->getEstoque());
               $query = "DELETE FROM livro WHERE idLivro = '$pk'";
               $sql = ConnectDB::getConexao()->prepare($query);
               $sql->execute();
               $imagemDAO = new ImagemDAO();
               $imagemDAO->deleteImagemById($livro->getImagem());
               $estoqueLivroDAO->deleteEstoqueById($estoque->getId());
               DAOManager::resetAutoIncrement("livro");
          } catch (Exception $e) {
               print($e);
          }
     }
}
