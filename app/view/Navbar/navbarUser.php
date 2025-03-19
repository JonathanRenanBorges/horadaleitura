<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="<?php echo mainFolder . assetsFolder; ?>img/logo.jpg" width="31" height="30"
                class="d-inline-block align-top" alt="">
            <h1>Hora da Leitura<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="<?php echo mainFolder; ?>#hero">Home</a></li>
                <li><a href="<?php echo mainFolder; ?>#about">Sobre</a></li>
                <li><a href="<?php echo mainFolder; ?>#services">Serviços</a></li>
                <li><a href="<?php echo mainFolder; ?>#faq">Perguntas</a></li>
                <li><a href="<?php echo mainFolder; ?>#contact">Contato</a></li>
                <li class="dropdown"><a href="#"><span>Livros</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="<?php echo mainFolder . viewFolder; ?>Livro">Livros</a></li>
                        <li><a href="<?php echo mainFolder . viewFolder; ?>Perfil/MeusLivros">Meus Livros</a></li>
                        
                        <?php
                        if ($_SESSION['user']->getAcesso() >= 2) {
                            ?>
                            <li><a href="<?php echo mainFolder . viewFolder; ?>Admin/Agendados">Agendados </a></li>
                            <li><a href="<?php echo mainFolder . viewFolder; ?>Livro/Cadastro">Cadastrar </a></li> <?php
                        }
                        ?>

                    </ul>
                </li>
                <li><a class="get-started-btn scrollton" href="<?php echo mainFolder . viewFolder; ?>Perfil">Perfil</a>
                </li>
            </ul>
        </nav>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>