<?php

echo '<!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title></title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="">
            </head>
            <body>
                <h4> Usuário ID: ' . $usuario->getID() . '. </h4>
                <ul> 
                    <li> <a href="views/produto/listar_user.php"> Visualizar Produtos </li>
                    <li> <a href="./controller/UsuarioController.php?logout=true"> Sair </a> </li>
                </ul>
            </body>
        </html>';


?>