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

$generoLivro = $generoLivroDAO->getGeneroLivroByLivroId($livro['idLivro']);
$genero = $generoDAO->getGeneroById($generoLivro->getFkGenero());

$estoque = $estoqueDAO->getEstoqueById($livro['fkEstoque']);

$classificacao = $classificacaoDAO->getClassificacaoById($livro['fkClassificacao']);

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
    <main id="main">
        <div class="container-fluid"><br>
            <h3> ALTERAR LIVRO: <?php echo $livro['titulo']; ?> </h3><br>
            <div class="content">
                <form action="<?php echo mainFolder . controllerFolder; ?>Livro/ControllerLivro.php" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" id="idLivro" name="idLivro" value="<?php echo $livro['idLivro']; ?>">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Título</span>
                            <input type="text" id="fname" name="titulo" value="<?php echo $livro['titulo']; ?>"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">ISBN</span>
                            <input type="text" id="fname" name="isbn" value="<?php echo $livro['isbn']; ?>" maxlength="13" minlength="13" placeholder="Digite o ISBN do livro" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Descrição</span>
                            <input type="text" id="fname" name="descricao" value="<?php echo $livro['descricao']; ?>"
                                placeholder="Digite a descrição" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Autor</span>
                            <input list="autores" id="lname" name="autor" value="<?php echo $autor->getNome(); ?>"
                                autocomplete="on" min="1" max="9" required>
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
                            <input list="editora" id="lname" name="editora" value="<?php echo $editora->getNome(); ?>"
                                autocomplete="on" min="1" max="9" required>
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

                                    <option value="<?php print $row['classificacao']; ?>" <?php if ($row['classificacao'] == $classificacao->getClassificacao()) {
                                           print 'selected';
                                       } ?>>
                                        <?php print $row['classificacao']; ?>
                                    </option>

                                    <?php

                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Gênero</span>
                            <input list="generos" name="genero" id="genero" value="<?php echo $genero->getGenero(); ?>"
                                required>
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
                            <input type="text" id="ed" name="edicao" value="<?php echo $livro['edicao']; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Número de páginas</span>
                            <input type="number" id="nm" name="paginas" value="<?php echo $livro['paginas']; ?>"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">Lançamento</span>
                            <input type="date" id="dat" name="lancamento" value="<?php echo $livro['lancamento']; ?>"
                                required>
                        </div>
                    </div>
                    <div class="title">
                        <h4>Estoque</h4>
                    </div>
                    <div class="input-box">
                        <span class="details">Quantidade</span>
                        <input type="number" value="<?php echo $estoque->getQuantidade(); ?>" min="1" max="999"
                            id="quan" name="estoque" placeholder="Digite a quantidade" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Em Uso</span>
                        <input type="number" value="<?php echo $estoque->getEmUso() ?: 0; ?>" min="0" max="999"
                            id="quan" name="emuso" placeholder="Digite a quantidade" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Imagem</span>
                        <input id="imagem" name="imagem" type="file">
                    </div>
                    <div class="button">
                        <input type="submit" value="Inserir" name="update">
                    </div>
                </form>
            </div>

        </div>

    </main>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
</body>

</html>