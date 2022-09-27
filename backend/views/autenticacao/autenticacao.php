<?php

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Usuario.php');

$login = new UserDao();

if($login->checkLogin()) {
	header("Location: ../../");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300;400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../frontend/css/style.css"/>
    <script src="../../../frontend/js/login.js" defer></script>
    <title>Login </title>
</head>
<body>


    <header>

        <div class="logoo" >
        <h2><a id="logo">Pesquisa<span id="ponto"> Hardware</span></a></h2>
        </div>  
            

    </header>


    <main>

    
        <div class="login-container" id="login-container">
            <div class="form-container">

                <!-- LOGIN -->
                <form action="../../controller/UsuarioController.php" method="post" name="entrar" class="form form-login">
                    <h2 class="form-title">Fazer Login</h2>

                    <p class="form-text"> Utilize sua conta</p>
                    <p>Digite seu Email e senha para entrar </p>
                    <div class="form-input-container">
                        <input class="form-input" type="email" id="mail" name="mail" required placeholder="Email"/>
                        <input class="form-input" type="password" id="senha" name="senha" required placeholder="Senha"/>
                    </div>
                    <input type="submit" id="login" name="login" value="ENTRAR" class="form-button"/>
                    <p class="mobile-text">
                        Não tem conta?
                        <a href="#" id="open-register-mobile">Registre-se</a>
                    </p>
                </form>

                <!-- CADASTRO -->
                <form class="form form-register" action="../../controller/UsuarioController.php" method="post" name="cad">
                    <h2 class="form-title">Criar Conta</h2>

                    <p class="form-text">Utilize o seu email Para o Cadastro</p>

                    <div class="form-input-container">
                        <input class="form-input" type="text" id="nome" name="nome" placeholder="Nome" required/>
                        <input class="form-input" type="email" id="mail" name="mail" placeholder="Email"  required/>
                        <input class="form-input" type="password" id="senha" name="senha" placeholder="Senha"  required/>
                    </div>

                    <input class="form-button" type="submit" id="cadastrar" name="cadastrar" value="Cadastrar" />
                    <p class="mobile-text">
                        Já tem conta?
                        <a href="#" id="open-login-mobile">Login</a>
                    </p>
                </form>
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <h2 class="form-title form-title-light">Já tem conta?</h2>
                    <p class="form-text">Para entrar na nossa plataforma faça login com suas informações</p>
                    <button class="form-button form-button-light" id="open-login">Entrar</button>
                </div>
                <div class="overlay">
                    <h2 class="form-title form-title-light">Bem vindo(a)</h2>
                    <p class="form-text">Cadastre-se e comece a usar a nossa plataforma on-line</p>
                    <button class="form-button form-button-light" id="open-register">Cadastrar</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>