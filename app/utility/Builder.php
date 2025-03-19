<?php

namespace app\Utility; 
require_once __DIR__ . "/constants.php";
{
    class Builder
    {

        public function buildNavbar($account, $nome, $access)
        {
            if ($account == false) {
                return $this->buildFile("Navbar/navbarNA.php");
            } else {
            return $this->buildFile("Navbar/navbarUser.php");
            }
        }
        public function buildHead($file)
        {
            ?>
            <head>
                <meta charset="utf-8">
                <meta content="width=device-width, initial-scale=1.0" name="viewport">

                <title>Hora da Leitura</title>
                <meta content="" name="description">
                <meta content="" name="keywords">
                <link href="<?php echo mainFolder . assetsFolder; ?>img/logo.jpg" rel="icon">
                <link href="<?php echo mainFolder . assetsFolder; ?>img/logo.jpg" rel="apple-touch-icon">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
                <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
                <link href="<?php echo mainFolder . assetsFolder; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                <link href="<?php echo mainFolder . assetsFolder; ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
                <link href="<?php echo mainFolder . assetsFolder; ?>vendor/aos/aos.css" rel="stylesheet">
                <link href="<?php echo mainFolder . assetsFolder; ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
                <link href="<?php echo mainFolder . assetsFolder; ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
                <link href="<?php echo mainFolder . assetsFolder; ?>css/<?php echo $file; ?>.css" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
            </head> <?php
            
        }

        public function buildScripts(){
                    ?>
            <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>js/login.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>js/livros.js"></script>
            <script src="https://kit.fontawesome.com/a81368914c.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>vendor/aos/aos.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>vendor/glightbox/js/glightbox.min.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>vendor/purecounter/purecounter_vanilla.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>vendor/swiper/swiper-bundle.min.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>vendor/php-email-form/validate.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>js/main.js"></script>
            <script src="<?php echo mainFolder . assetsFolder; ?>js/ajax.js"></script><?php
        }
        public function buildFile($path){
            include_once __DIR__ . '/../View/' . $path;
        }
    }
}

  ?>