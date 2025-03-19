<?php 

?>
<body>
  <div class="container" id="container">
        <div class="form-container sign-up">
            <form class="formSign" method="POST" action="<?php echo mainFolder . controllerFolder; ?>Usuario/ControllerUsuario.php">
                <h1>Criar Conta</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>ou use seu email para registrar</span>
                <input type="text" name="nome" placeholder="Nome" required>
                <input class="formSignEmail" type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" minlength="5" maxlength="40" placeholder="Senha" required>
                <input type="tel" name="telefone" placeholder="Telefone" minlength="11" maxlength="11" required>
                <button type="submit" value="cadastrar" class="hidden" name="cadastrar" id="cadastrar">Cadastrar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form class="formLogin" method="POST" action="<?php echo mainFolder . controllerFolder ?>Usuario/ControllerUsuario.php">
                <h1>Login</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>ou use seu email para logar</span>
                <input class="formLoginEmail" type="email" name="email" placeholder="Email" required>
                <input class="formLoginSenha" minlength="1" maxlength="40" type="password" name="senha" placeholder="Senha" required>
                <a href="#">Esqueceu a senha?</a>
                <button type="submit" value="login" class="hidden login-button" name="login" id="entrar">Entrar</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bem-Vindo!</h1>
                    <p>Já tem uma conta? Clique aqui para ir em login!</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Bem-Vindo Novamente!</h1>
                    <p>Ainda não tem uma conta? Registre-se com seus dados pessoais para usar todos os recursos do site!</p>
                    <button class="hidden" id="register">Criar Conta</button>
                </div>
            </div>
        </div>
  </div>
</body>