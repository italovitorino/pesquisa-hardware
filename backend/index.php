<?php

    session_start();

    require_once('./config/Conexao.php');
    require_once('./dao/UserDao.php');
    require_once('./model/Usuario.php');

    $usuario = new Usuario();
    $userdao = new UserDao();

    $login = new UserDao();

    if(!$login->checkLogin()) {
        header("Location: ./views/autenticacao/autenticacao.php");
    }

    foreach($userdao -> user() as $usuario) {

        if($usuario->getID() == 1 && $usuario->getNome() == "admin") {
            header("Location: ./views/users/admin.php");
        } else {
            header("Location: ./views/produto/listar_user.php");
        }
    
    }
?>