<?php

use app\Model\Autor;
use app\Model\Classificacao;
use app\Model\Editora;

$query = "SELECT classificacao FROM classificacaoindicativa";
$select = ConnectDB::getConexao()->prepare($query);
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();

$query = "SELECT nome FROM autor";
$select2 = ConnectDB::getConexao()->prepare($query);
$select2->setFetchMode(PDO::FETCH_ASSOC);
$select2->execute();

$query = "SELECT nome FROM editora";
$select3 = ConnectDB::getConexao()->prepare($query);
$select3->setFetchMode(PDO::FETCH_ASSOC);
$select3->execute();

$query = "SELECT genero FROM generoliterario";
$select4 = ConnectDB::getConexao()->prepare($query);
$select4->setFetchMode(PDO::FETCH_ASSOC);
$select4->execute();

?>

<body>

  <div class="cad">
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
  </div>

  <div class="container">
    <div class="title">Cadastre o Livro</div>
    <div class="content">
      <form action="<?php echo mainFolder . controllerFolder; ?>Livro/ControllerLivro.php" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Título</span>
            <input type="text" id="fname" name="titulo" placeholder="Digite o título" required>
          </div>
          <div class="input-box">
            <span class="details">ISBN</span>
            <input type="text" id="fname" name="isbn" placeholder="Digite o ISBN do livro" required>
          </div>
          <div class="input-box">
            <span class="details">Descrição</span>
            <input type="text" id="fname" name="descricao" placeholder="Digite a descrição" required>
          </div>
          <div class="input-box">
            <span class="details">Autor</span>
            <input list="autores" id="lname" name="autor" placeholder="Digite o autor" autocomplete="on" min="1" max="9" required>
            <datalist id="autores">
              <?php
              foreach ($select2 as $row) {
                ?>
                <option value="<?php print $row['nome']; ?>">
                  <?php

              }
              ?>
            </datalist>
          </div>
          <div class="input-box">
            <span class="details">Editora</span>
            <input list="editora" id="lname" name="editora" placeholder="Digite a editora" autocomplete="on" min="1" max="9" required>
            <datalist id="editora">
              <?php
              foreach ($select3 as $row) {
                ?>
                <option value="<?php print $row['nome']; ?>">
                  <?php

              }
              ?>
            </datalist>
          </div>
          <div class="input-box">
            <span class="details">Classificação</span>
            <select id="classificacoes" name="classificacao"><br>
              <?php
              foreach ($select as $row) {
                ?>
                <option value="<?php print $row['classificacao']; ?>"><?php print $row['classificacao']; ?></option>
                  <?php

              }
              ?>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Gênero</span>
            <input list="generos" name="genero" id="genero" placeholder="Digite o gênero" required>
            <datalist id="generos"><br>
              <?php
              foreach ($select4 as $row) {
                ?>
                <option value="<?php print $row['genero']; ?>">
                  <?php
              }
              ?>
            </datalist>
          </div>
          <div class="input-box">
            <span class="details">Edição</span>
            <input type="text" id="ed" name="edicao" placeholder="Digite a edição" required>
          </div>
          <div class="input-box">
            <span class="details">Número de páginas</span>
            <input type="number" id="nm" name="paginas" placeholder="Digite o número de páginas" required>
          </div>
          <div class="input-box">
            <span class="details">Lançamento</span>
            <input type="date" id="dat" name="lancamento" placeholder="Ano do lançamento" required>
          </div>
        </div>
        <div class="title">Estoque</div>
        <div class="input-box">
          <span class="details">Quantidade</span>
          <input type="number" min="1" max="999" id="quan" name="estoque" placeholder="Digite a quantidade" required>
        </div>
        <div class="input-box">
          <span class="details">Imagem</span>
          <input id="imagem" name="imagem" type="file">
        </div>
        <div class="button">
          <input type="submit" value="Inserir" name="cadastrar">
        </div>
      </form>
    </div>
  </div>
  <br>

  
</body>

</html>
<?php
$select->closeCursor();
?>