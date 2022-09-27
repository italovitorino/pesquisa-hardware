<?php 

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/ProdutoDao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Produto.php');

$produto = new Produto();
$produtodao = new ProdutoDao();

$login = new UserDao();

$id = $_SESSION['user_session'];

if(!$login->checkLogin()|| $id != 1) {
    header("Location: ../autenticacao/autenticacao.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Alterar Produto </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
 
    <style type="text/css">
        
         #mostrar {
             width: 140px;
             height: 120px;
             margin: 10px;
             border: 1px dashed #CCC;
         }
 
    </style>

    <style>
        body{ font-family: Arial, Helvetica, sans-serif; background-color: #F7F7F7; }
        .box{
            position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
            background-color: #FF8A00;
            padding:15px;
            border-radius:15px;
            width: 25%;
            color: #fff;
            min-width:320px;
            max-width:800px ;
        }
        h2{ text-align: center; color: rgb(0, 0, 0);   }
        fieldset{border:5px solid #000;border-radius: 9px;}
        legend{ border:1px solid #000; padding: 10px;
         text-align: center; background-color: #000;
         color: rgb(255, 255, 255); font-weight: 600; border-radius: 8px;}
         input{
            background: none;
            border: none;
            border-bottom:2px solid #fff ;
            outline: none;
            color: white;
            font-size: 16px;
            margin: 10px;
            width:90%;
            letter-spacing:2px ;
         }
         textarea { resize: none;width: 93%; border-radius: 8px; background-color: rgba(95, 95, 95, 0.133); border: 2px solid #fff; outline: none; color: #fff;}
         .alterar{
            width: 90px;
            border: 2px solid #000;
            background-color: #fff;
            color: rgb(0, 0, 0);
            border-radius: 5px;
            font-weight: 600;
            background-color:#fff ;
            letter-spacing:0px;
            cursor: pointer;
         }
         .alterar:hover{
            background-color: #000;
            color:rgb(255, 255, 255);
         }
         .alterarr{
            width: 90px;
            border: 2px solid #000;
            border-radius: 5px;
            font-weight: 600;
            font-size: 1rem;
            color: rgb(255, 0, 0);
            background-color:#fff ;

        
         }

         button a {
            color: #000;
         }
         .alterarr:hover{
            background-color: #000;
            color: #fff;
           
         }
        
         a:link{
            text-decoration: none;
            color: #000;
         }
         a:hover {text-decoration: underline; background-color: #000; color: #fff;}
         
    </style>

</head>
<body>
    
<div class="box">
    <h2> Alterar Produto </h2>
    <fieldset>
        <legend> Informe os dados do produto </legend>
        <?php foreach ($produtodao -> editar() as $produto) : ?>
            <form action="../../controller/ProdutoController.php" method="post" enctype="multipart/form-data" name="alter_pro">
                <label> Nome: </label>
                <input type="hidden" id="id_alter" name="id_alter" value="<?= $produto->getID() ?>" />
                <input type="text" id="nome" name="nome" value="<?= $produto->getNome() ?>" required />
                <br/> <br/>
                <label class="label-input"> Marca: </label>
                <input type="text" id="marca" name="marca" value="<?= $produto->getMarca() ?>" required />
                <br/> <br/>
                <label class="label-input" >Descrição</label>
                <textarea name="descricao" id="" cols="30" rows="10"><?= $produto->getDescricao() ?></textarea>
                <br/> <br/>
                <label class="label-input"> Categoria: </label>
                <input type="text" id="categoria" name="categoria" value="<?= $produto->getCategoria() ?>" required />
                <br/> <br/>
                <input class="alterar" type="submit" id="alterar" name="alterar" value="ALTERAR" />
                <button class="alterarr" > <a href="../users/admin.php" style="text-decoration:none;"> VOLTAR </a> </button>
            </form>
        <?php endforeach ?>
    </fieldset>
</div>

</body>
</html>