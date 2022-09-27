<?php

    require_once('../config/Conexao.php');

    require_once('../dao/UserDao.php');
    require_once('../model/Usuario.php');

    require_once('../dao/ProdutoDao.php');
    require_once('../model/Produto.php');

    require_once('../dao/FeedbackDao.php');
    require_once('../model/Feedback.php');
    

    $usuario = new Usuario();
    $userdao = new UserDao();

    $produto = new Produto();
    $produtodao = new ProdutoDao();

    $feedback = new Feedback();
    $feedbackdao = new FeedbackDao();

    $dados = filter_input_array(INPUT_POST);
    

?>