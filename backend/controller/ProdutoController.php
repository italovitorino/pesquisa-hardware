<?php

    require_once('../config/Conexao.php');
    require_once('../dao/ProdutoDao.php');
    require_once('../model/Produto.php');

    $produto = new Produto();
    $produtodao = new ProdutoDao();

    $dados = filter_input_array(INPUT_POST);

    if(isset($_POST['cadastrar'])) {
        $produto -> setNome($dados['nome']);
        $produto -> setMarca($dados['marca']);
        $produto -> setDescricao($dados['descricao']);
        $produto -> setCategoria($dados['categoria']);

        if($produtodao -> criar($produto)) {

            echo "<script>
                    alert('Produto Cadastrado com Sucesso!!');
                    location.href = '../views/users/admin.php';
                  </script>";
            }
    } else if(isset($_POST['alterar'])){

        $produto -> setID($dados['id_alter']);
        $produto -> setNome($dados['nome']);
        $produto -> setMarca($dados['marca']);
        $produto -> setDescricao($dados['descricao']);
        $produto -> setCategoria($dados['categoria']);
  
        if($produtodao -> alterar($produto)) {
  
            if(!is_file($del_img)){  
                echo "<script>
                        alert('Produto Atualizado com Sucesso!!');
                        location.href = '../views/users/admin.php';
                    </script>";
            }
        }
    } else if(isset($_POST['excluir'])) {
  
        $produto -> setID($_POST['id_del']);
  
        if($produtodao -> excluir($produto)) {
    
        echo "<script>
                alert('Produto Deletado com Sucesso!!');
                location.href = '../views/users/admin.php';
            </script>";
        }
  }

?>