<?php
$server = $_SERVER['DOCUMENT_ROOT'];
$autoloadFolder = getenv('folderName');
require_once $server . $autoloadFolder;
use app\Model\Imagem;

$imagem = new Imagem();
$imagemdao = new ImagemDAO();
$d = filter_input_array(INPUT_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if (isset($_POST['upload'])) {
          $file = $_FILES['imagem']['tmp_name'];
          $tamanho = $_FILES['imagem']['size'];
          $tipo = $_FILES['imagem']['type'];
          $nome = $_FILES['imagem']['name'];

          if ($file != "none") {
               $fp = fopen($file, "rb");
               $conteudo = fread($fp, $tamanho);
               $conteudo = addslashes($conteudo);
               fclose($fp);

               $imagem->setNome($nome);
               $imagem->setData($conteudo);
               $imagem->setTamanho($tamanho);
               $imagem->setTipo($tipo);

               $query = "SELECT data FROM imagem where data = '$conteudo'";
               $select = ConnectDB::getConexao()->query($query);
               if ($select->rowCount()) {
                    print("o conteudo da imagem já existe no banco de dados");
               }

               $imagemdao->insertImagem($imagem);
               print_r($imagem);
               header('Location: ' . mainFolder);
               exit();
          } else
               print "Não foi possível carregar a imagem.";
     }
}
