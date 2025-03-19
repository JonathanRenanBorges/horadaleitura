<?php

use app\DAO\LivroDAO;

$autorDAO = new app\DAO\AutorDAO();
$generoDAO = new app\DAO\GeneroLiterarioDAO();
$generoLivroDAO = new app\DAO\GeneroLivroDAO();
$imagemDAO = new app\DAO\ImagemDAO();
$livroDAO = new app\DAO\LivroDAO();
$usuarioDAO = new app\DAO\UsuarioDAO();
$query = "SELECT COUNT(idLivrosPedidos) AS total FROM livrospedidos";
$select = ConnectDB::getConexao()->prepare($query);
$select->execute();
$total_records = $select->fetchColumn();

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
if ($current_page == 0) {
    $current_page = 1;
}
$records_per_page = 3;
$offset = ($current_page - 1) * $records_per_page;

$query = "SELECT * FROM livrospedidos LIMIT $offset, $records_per_page";
$selectLivro = ConnectDB::getConexao()->prepare($query);
$selectLivro->setFetchMode(PDO::FETCH_ASSOC);
$selectLivro->execute();

$total_pages = ceil($total_records / $records_per_page);

?>

<body>
    <main id="main">

        <section id="livros" class="livros sections-bg">
            <div class="container" data-aos="fade-up">


                <div class="section-header">
                    <h2>Livros Agendados</h2>
                    <p>Livros que estão na lista de espera!</p>
                </div>



                <div>

                    <table>
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Livro</th>
                                <th>Data pedida</th>
                                <th>Data de retirada</th>
                                <th>Data de devolução</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($row = $selectLivro->fetch()) {
                                $livro = $livroDAO->getLivroById($row["fkLivro"]);
                                $usuario = $usuarioDAO->getUserById($row['fkUsuario']);
                                $pkLivro = $row['idlivrosPedidos'];
                                $pedido = $row['dataPedido'];
                                $retirada = $row['dataRetirada'];
                                $devolucao = $row['dataDevolucao'];
                                $emuso = $row['isEmUso'];
                                $dateDevolucao = new DateTime($devolucao);
                                $dateRetirada = new DateTime($retirada);
                                $dateNow = new DateTime();
                                ?>
                                <tr>
                                    <form class="form-container" id="formLivro"
                                        action="<?php echo mainFolder . controllerFolder; ?>LivrosPedidos/ControllerLivrosPedidos.php"
                                        method="POST" enctype="multipart/form-data">

                                        <?php
                                        echo "<td><a href=' " . mainFolder . viewFolder . "Perfil/?id=" . $usuario->getId() . " '> " . $usuario->getEmail() . "</a> </td><br>";
                                        echo "<td>" . $livro->getTitulo() . " </td><br>";
                                        echo "<td>" . $pedido . " </td><br>";
                                        echo "<td>" . $retirada . " </td><br>";
                                        echo "<td>" . $devolucao . " </td><br>";
                                        ?>
                                        <?php

                                        if ($emuso) {
                                            ?>
                                            <td><button type="submit" name="Confirm" class="bi bi-check-circle-fill"
                                                    style="color: white; background-color: var(--color-secondary)"></button>
                                            </td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><button type="submit" name="Confirm" class="bi bi-check-circle-fill"
                                                    style="color: white; background-color: var(--color-primary)"></button>
                                                <button type="submit" name="Delete" class="bi bi-trash3-fill"
                                                    style="color: white; background-color: red"></button>
                                            </td>
                                            <?php
                                        } ?>

                                        <?php
                                        echo "";
                                        /*if ($dateNow > $dateDevolucao && $emuso) {
                                            echo "<h5><strong>Atenção: </strong>Devolução em Atraso!   <br>";
                                        } elseif ($dateNow > $dateRetirada && !$emuso) {
                                            echo "<h5><strong>Aviso: </strong>Retirada em Atraso<br><br>";
                                        }*/

                                        ?>
                                </tr>




                                <input type="hidden" name="pkLivro" value="<?php echo $row['idlivrosPedidos']; ?>">
                                <input type="hidden" name="dataPedido" value="<?php echo $row['dataPedido']; ?>">
                                <input type="hidden" name="dataRetirada" value="<?php echo $row['dataRetirada']; ?>">
                                <input type="hidden" name="dataDevolucao" value="<?php echo $row['dataDevolucao']; ?>">


                    </div>
                </div>
                <?php

                            }

                            ?>
            </form>
            </tr>
            </tbody>
            </table>

            <div class="pagination">
                <?php
                $nextPage = $current_page + 1;
                $previousPage = $current_page - 1;
                if ($previousPage == 0) {
                    $previousPage = 1;
                }
                if ($nextPage > $total_pages) {
                    $nextPage = $total_pages;
                }
                ?>
                <a class="next" href="<?php echo "?page=" . $previousPage; ?>">«</a>

                <?php
                for ($i = 1; $i <= ($total_pages); $i++) {
                    if ($i == $current_page) {
                        echo '<a class="active" href="#">' . $i . '</a>';
                    } else {
                        echo '<a href="?page=' . $i . '"> ' . $i . '</a>';
                    }
                }
                ?>

                <a class="next" href="<?php echo "?page=" . $nextPage; ?>">»</a>
            </div>

            </div>
        </section>

    </main>


    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="<?php echo mainFolder; ?>" class="logo d-flex align-items-center">
                        <span>Hora da Leitura</span>
                    </a>
                    <p>Sua biblioteca pessoal, em qualquer lugar, a qualquer hora.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Serviços</a></li>
                        <li><a href="https://www.google.com/intl/pt-BR/policies/terms/archive/20070416/">Termos de
                                Serviço</a></li>
                        <li><a href="https://policies.google.com/privacy?hl=pt-BR">Política de Privacidade</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Serviços</h4>
                    <ul>
                        <li><a href="listaLivros.php">Livros</a></li>
                        <li><a href="alugaLivro.php">Alugar Livro</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contato</h4>
                    <p>
                        <strong>Email:</strong> horadaleitura@gmail.com<br>
                    </p>

                </div>

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright <strong><span> Hora da Leitura</span></strong>. Todos os Direitos Reservados
            </div>
        </div>

    </footer>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
</body>

</html>