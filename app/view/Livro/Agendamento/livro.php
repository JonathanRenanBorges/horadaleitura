<?php

use app\Model\Estoque;

$autorDAO = new app\DAO\AutorDAO();
$generoDAO = new app\DAO\GeneroLiterarioDAO();
$generoLivroDAO = new app\DAO\GeneroLivroDAO();
$imagemDAO = new app\DAO\ImagemDAO();
$estoqueDAO = new app\DAO\EstoqueDAO();
$getId = isset($_GET['livro']) ? $_GET['livro'] : 1;

$query = "SELECT * FROM livro WHERE idLivro = '$getId'";
$selectLivro = ConnectDB::getConexao()->prepare($query);
$selectLivro->setFetchMode(PDO::FETCH_ASSOC);
$selectLivro->execute();
?>

<body>
    <main id="main">

        <div class="section-header">
            <br>
            <h2>Agendamento de Livros</h2>
            <p>Preencha os dados e agende seu livro!</p>

            <h4><?php
            $livro = $selectLivro->fetch();
            $estoque = new Estoque();
            $estoque = $estoqueDAO->getEstoqueById($livro['fkEstoque']);
            ?>
                <br>
                <h4><strong>Livro: </strong> <?php echo $livro['titulo']; ?></h4><br><?php
                   if ($estoque->getQuantidade() <= $estoque->getEmUso()) {
                       ?>
                    <h2>OPS! Parece que seu livro já está fora de estoque... Volte novamente mais tarde!</h2>
                    <div class="notfound">
                        <a href="<?php echo mainFolder . viewFolder; ?>Livro">Volte para a página de Livros</a>
                    </div>
                    <?php
                    exit();
                   } elseif (!isset($_SESSION['user'])) {
                       ?>
                    <h2>Cadastre-se para agendar um livro</h2><?php
                   }
                   ?>

                <div class="container">

                    <div class="title">Agendamento</div>
                    <div class="content">

                        <form
                            action="<?php echo mainFolder . controllerFolder; ?>LivrosPedidos/ControllerLivrosPedidos.php"
                            method="post">
                            <div class="user-details">
                                <input type="hidden" id="fkLivro" name="fkLivro"
                                    value="<?php echo $livro['idLivro']; ?>">
                                <input type="hidden" id="fkUsuario" name="fkUsuario"
                                    value="<?php echo $_SESSION['user']->getId(); ?>">

                                <div class="input-box">
                                    <span class="details">Retirada</span>
                                    <input required type="date" id="retirada" name="retirada"
                                        min="<?php echo date("Y-m-d", strtotime("+1 week")); ?>"
                                        max="<?php echo date("Y-m-d", strtotime("+4 weeks")); ?>">
                                    </input>
                                </div>

                                <div class="input-box">
                                    <span class="details">Devolução</span>
                                    <input required type="date" id="devolucao" name="devolucao">
                                </div>
                            </div>

                            <div class="button">
                                <input type="submit" name="agendar" value="Agendar">
                            </div>
                        </form>
                    </div>
                </div>

            </h4>
        </div>

        <script>
            const retiradaInput = document.getElementById("retirada");
            const devolucaoInput = document.getElementById("devolucao");

            retiradaInput.addEventListener("input", () => {
                const retiradaDate = new Date(retiradaInput.value);
                const minDevolucaoDate = new Date(retiradaDate.getTime() + 5 * 24 * 60 * 60 * 1000); // 5 dias
                const maxDevolucaoDate = new Date(retiradaDate.getTime() + 21 * 24 * 60 * 60 * 1000); // 3 semanas
                devolucaoInput.min = minDevolucaoDate.toISOString().split("T")[0];
                devolucaoInput.max = maxDevolucaoDate.toISOString().split("T")[0];
            });

            devolucaoInput.addEventListener("input", () => {
                const devolucaoDate = new Date(devolucaoInput.value);
                const retiradaDate = new Date(retiradaInput.value);
                if (devolucaoDate < retiradaDate) {
                    devolucaoInput.value = "";
                }
            });
        </script>
    </main>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
</body>

</html>