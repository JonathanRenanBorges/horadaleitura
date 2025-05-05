<?php

use app\DAO\ImagemDAO;
use app\DAO\UsuarioDAO;


$userDAO = new UsuarioDAO();

$user = $_SESSION['user'];
$id = $user->getId();

if (isset($_GET['id']) && $user->getAcesso() > 1){
  $id = $_GET['id'];
  $user = $userDAO->getUserById($id);
}
$nivel = "Leitor";
if ($user->getAcesso() >= 2) {
  $nivel = "Admin";
}
$nome = $user->getNome();
$email = $user->getEmail();
$telefone = $user->getTelefone();
$img = $user->getFotoPerfil();
$imagemDAO = new ImagemDAO();
$imagem  = $imagemDAO->getImagemById($user->getFotoPerfil()) ?: $imagemDAO->getImagemById(1);

?>

<body>

  <div class="container">
    <br>
    <div class="main-body">

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">

                <form method="post" action="<?php echo mainFolder . controllerFolder ?>Usuario/ControllerUsuario.php" enctype="multipart/form-data">
                  
                  <input type="hidden" name="pkUsuario" value="<?php echo $user->getId(); ?>">
                  <input type="file" name="imagem" id="file" class="inputfile" style="width: 0px;
	height: 0px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;" />

                  <label for="file"> <img src="<?php echo mainFolder . assetsFolder; ?>img/perfis/<?php echo $imagem->getNome(); ?>" alt="Admin" class="rounded-circle"
                      width="150" style="cursor: pointer;"></label>
                  <button type="submit" name="update" class="btn btn-primary">Alterar Imagem</button>
                </form>
                <div class="mt-3">
                  <h4><?php echo $nome; ?></h4>
                  <a href="<?php echo mainFolder . viewFolder ?>Logout"><button type="button">Sair</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nome:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $nome; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $email; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Telefone:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $telefone; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">ID da Conta:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user->getId(); ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nível de Acesso:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $nivel; ?>
                </div>
              </div>
              <hr>
            </div>

            <div class="card shadow-sm">
              <div class="card-header bg-transparent border-0">
                <h3 class="mb-0">Outras Informações</h3>
              </div>
              <div class="card-body pt-0">
                <p>Em breve...</p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>


</body>
