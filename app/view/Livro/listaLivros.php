<?php

use app\DAO\LivroDAO;

$autorDAO = new app\DAO\AutorDAO();
$generoDAO = new app\DAO\GeneroLiterarioDAO();
$generoLivroDAO = new app\DAO\GeneroLivroDAO();
$imagemDAO = new app\DAO\ImagemDAO();
$livroDAO = new app\DAO\LivroDAO();
$query = "SELECT COUNT(idLivro) AS total FROM livro";
$select = ConnectDB::getConexao()->prepare($query);
$select->execute();
$total_records = $select->fetchColumn();

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
if ($current_page == 0) {
  $current_page = 1;
}
$records_per_page = 3;
$offset = ($current_page - 1) * $records_per_page;

$query = "SELECT * FROM livro LIMIT $offset, $records_per_page";
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
         <h2>Livros</h2>
          <p>Alguns dos livros que estão presentes aqui na Hora da Leitura!</p>
        </div>

        <div class="livros-isotope" data-livros-filter="*" data-livros-layout="masonry"
          data-livros-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div>
            <?php
            function tirarAcentos($string)
            {
              return preg_replace(array("/(ç)/", "/(Ç)/", "/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "c C a A e E i I o O u U n N"), $string);
            }

            $query = "SELECT genero FROM generoliterario";
            $select = ConnectDB::getConexao()->prepare($query);
            $select->setFetchMode(PDO::FETCH_ASSOC);
            $select->execute();
            $result = $select->fetchAll();
            ?>
            <ul class="livros-flters">
              <li data-filter="*" class="filter-active"><strong>Todos</strong></li>
              <?php
              foreach ($result as $row) {
                $genero = tirarAcentos(strtolower($row["genero"]));
                $generoSA = $row["genero"];
              ?>
                <li data-filter=".filter-<?php echo $genero; ?>"><?php echo $generoSA; ?></li><?php
                                                                                            }
                                                                                              ?>
            </ul>
          </div>

          <div class="row gy-4 livros-container">

            <?php

            while ($row = $selectLivro->fetch()) {
              $autor = $autorDAO->getAutorById($row["fkAutor"]);
              $generoLivro = $generoLivroDAO->getGeneroLivroByLivroId($row['idLivro']);
              $genero = $generoDAO->getGeneroById($generoLivro->getFkGenero());
              $imagem = $imagemDAO->getImagemById($row["fkImagem"]);



              /*
              $imagick = new Imagick();
            
              $imagick->readImageBlob($imagem['data']);
              print($imagick->readImageBlob($imagem['data'], $imagem['nome']));
              print($imagick->getImageBlob() . ' ');
              $imagick->setImageFormat("jpg");
              $imageData = $imagick->getImageBlob();
              */

            ?>
              <div
                class="col-xl-4 col-md-6 livros-item <?php echo "filter-" . tirarAcentos(strtolower($genero->getGenero())); ?>">
                <div class="livros-wrap">
                  <a href="#" data-gallery="livros-gallery-app">

                    <img src="<?php echo mainFolder . assetsFolder; ?>img/livros/<?php echo $imagem->getNome(); ?>"
                      class="img-fluid" alt="<?php echo $imagem->getNome(); ?>" />
                  </a>
                  <div class="livros-info">
                  <div class="container-gy">
                      <div class="product">
                        <div class="product-card">
                          <a href="<?php echo mainFolder . viewFolder; ?>Livro/Info?livro=<?php echo $row['idLivro'] ?>" class="popup-btn">Ver</a>
                        </div>
                      </div>
                    </div>
                    <h4><a href="#" title="More Details"><?php echo $row['titulo']; ?></a></h4>
                    <p><?php echo $autor->getNome(); ?></p>
                    <?php
                    if (isset($_SESSION['user'])) {
                      $user = $_SESSION['user'];
                     
                        if ($user->getAcesso() >= 2) {
                      ?>
                        <br>
                        <button class="updateLivro btn btn-info"><a
                            href="<?php echo mainFolder . viewFolder; ?>Livro/Update?livro=<?php echo $row['idLivro'] ?>"
                            style="color: white;">Editar</a></button>
                        <button class="deleteLivro btn btn-danger" name="<?php echo $row['idLivro']; ?>"
                          value="<?php echo $row['idLivro']; ?>">Deletar</button>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            <?php

            }

            ?>


          </div>
        </div>
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
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Serviços</a></li>
            <li><a href="https://www.google.com/intl/pt-BR/policies/terms/archive/20070416/">Termos de Serviço</a></li>
            <li><a href="https://policies.google.com/privacy?hl=pt-BR">Política de Privacidade</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Serviços</h4>
          <ul>
            <li><a href="listaLivros.php">Livros</a></li>
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