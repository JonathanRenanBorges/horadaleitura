<?php
$autorDAO = new app\DAO\AutorDAO();
$editoraDAO = new app\DAO\EditoraDAO();
$generoDAO = new app\DAO\GeneroLiterarioDAO();
$classificacaoDAO = new app\DAO\ClassificacaoDAO();
$estoqueDAO = new app\DAO\EstoqueDAO();
$generoLivroDAO = new app\DAO\GeneroLivroDAO();
$imagemDAO = new app\DAO\ImagemDAO();

$getId = isset($_GET['livro']) ? $_GET['livro'] : 1;

$query = "SELECT * FROM livro WHERE idLivro = '$getId'";
$selectLivro = ConnectDB::getConexao()->prepare($query);
$selectLivro->setFetchMode(PDO::FETCH_ASSOC);
$selectLivro->execute();
$livro = $selectLivro->fetch();

$autor = $autorDAO->getAutorById($livro['fkAutor']);
$editora = $editoraDAO->getEditoraById($livro['fkEditora']);
$imagem = $imagemDAO->getImagemById($livro['fkImagem']);
$generoLivro = $generoLivroDAO->getGeneroLivroByLivroId($livro['idLivro']);
$genero = $generoDAO->getGeneroById($generoLivro->getFkGenero());
$estoque = $estoqueDAO->getEstoqueById($livro['fkEstoque']);
$classificacao = $classificacaoDAO->getClassificacaoById($livro['fkClassificacao']);
?>

<body><br>
  <div class="container">
    <div class="single-product">
      <div class="row">
        <div class="col-6">
          <div class="product-image">
            <div class="product-image-main">
              <img src="<?php echo mainFolder . assetsFolder; ?>img/livros/<?php echo $imagem->getNome(); ?>" alt=""
                id="product-main-image">
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="breadcrumb">
            <span class="active"><strong>Informações do Livro</strong></span>
          </div>

          <div class="product">
            <div class="product-title">
              <h2><?php echo $livro['titulo']; ?></h2>
            </div>

            <div class="product-details">
              <br><h6><strong>Autor: </strong><?php echo $autor->getNome(); ?></h6>
              <h6><strong>Editora: </strong><?php echo $editora->getNome(); ?></h6>
              <h6><strong>Páginas: </strong><?php echo $livro['paginas']; ?></h6>
              <h6><strong>Lançamento: </strong><?php echo $livro['lancamento']; ?></h6>
              <h6><strong>Edição: </strong><?php echo $livro['edicao']; ?></h6>
              <h6><strong>Classificação: </strong><?php echo $classificacao->getClassificacao(); ?></h6><br>
              <h6><strong>Descrição: </strong><?php echo $livro['descricao']; ?></h6>
            </div>
            <span class="divider"></span>

            <div class="product-btn-group">
              <a href="<?php echo mainFolder . viewFolder; ?>Livro/Agendamento?livro=<?php echo $livro['idLivro']; ?>">
                <div class="button buy-now">Agendar</div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>