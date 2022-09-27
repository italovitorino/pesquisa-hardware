<?php

    require_once('../config/Conexao.php');
    require_once('../dao/UserDao.php');
    require_once('../model/Usuario.php');

    $usuario = new Usuario();
    $userdao = new UserDao();

    $dados = filter_input_array(INPUT_POST);

    if(isset($_POST['cadastrar'])){

        $usuario -> setNome($dados['nome']);
        $usuario -> setEmail($dados['mail']);
        $usuario -> setSenha(password_hash($dados['senha'], PASSWORD_DEFAULT)); 
    
        if($userdao -> criar($usuario)) {
    
        echo "<script>
                alert('Usuário Cadastrado com Sucesso!!');
                location.href = '../views/autenticacao/autenticacao.php';
              </script>";
        }
    } else if(isset($_POST['login'])) {

        $usuario -> setEmail(strip_tags($dados['mail']));
        $usuario -> setSenha(strip_tags($dados['senha'])); 
        
        $userdao -> login($usuario);
        
        if($userdao -> login($usuario)) {
        
        echo "<script>
            alert('Usuário logado com Sucesso!!');
            location.href = '../';
            </script>";
        
        } else {
            echo "<script>
                alert('Acesso inválido! login ou senha incorretos!');
                location.href = '../views/autenticacao/autenticacao.php';
                </script>";
        }	
    } else if(isset($_GET['logout'])) {
        $userdao -> logout();

        header("Location: ../../");
    }

?>