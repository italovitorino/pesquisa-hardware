<?php

session_start();

require_once('../../config/Conexao.php');
require_once('../../dao/ProdutoDao.php');
require_once('../../dao/UserDao.php');
require_once('../../model/Produto.php');

$produto = new Produto();
$produtodao = new ProdutoDao();

$login = new UserDao();

if (!$login->checkLogin()) {
    header("Location: ../login");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Listar Usuários </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">

    <script src="../../../frontend/feedback/js/main.js" defer></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@200;400&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
        }


        ::-webkit-scrollbar-track {
            background-color: #222222;
        }

        ::-webkit-scrollbar {
            width: 4px;
            background: #222222;
        }

        ::-webkit-scrollbar-thumb {
            background: #FF8A00;
        }

        a {
            text-decoration: none;
            border-bottom: 2px;
            transition: 0.6s;
        }

        nav a:hover {
            border-bottom: 2px solid #FF8A00 !important;
            color: #FF8A00 !important;
        }

        button:hover {
            transform: scale(1.1);
            transition: all 0.6s;
        }

        body {
            overflow-x: hidden;
        }

        header {
            background-color: #222222;
            width: 100%;
            height: 14vh;
            padding: 2%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 20px;
            font-family: 'Poppins', sans-serif;
            color: #FFFFFF;
        }

        header>p {
            font-size: 1.6rem;
            letter-spacing: 2px;
            margin: auto 0;
        }

        .menu {
            display: flex;
            justify-content: space-around;
            color: #FFFFFF;
            font-family: 'Roboto', sans-serif;
        }

        .menu svg {
            fill: #FF8A00;
        }

        .menu li,
        a {
            margin: 12px;
            cursor: pointer;
            padding: 5px;
        }

        #titulo-ajuda {
            display: flex;
            justify-content: space-around;
            align-items: center;
            text-align: center;
        }

        h1 {
            margin: 2%;
            font-size: 5.2em;
            color: #FF8A00;
        }

        p {
            font-size: 1.7em;
        }

        /*  quadrado {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    width: 400px;
    height: 400px;
    background-color: #222222;
    margin: 45px;
    background-image: url(https://media4.giphy.com/media/IBawXRqkcH4ALM4ets/giphy.gif?cid=ecf05e47i5rl4f94y20lw6ownea2zfc881g70xpn8opkomo6&rid=giphy.gif&ct=gz);
} */

        #fade,
        #modal {
            transition: 0.5s;
            opacity: 1;
            pointer-events: all;
        }

        nav ul li a {
            color: #fff;
        }

        #fade {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 5;
            background-color: rgba(0, 0, 0, 0.6);
        }

        #modal {
            position: fixed;
            width: 100%;
            left: 50%;
            top: 50%;
            z-index: 10;
            transform: translate(-50%, -50%);
            max-width: 90%;
            padding: 1.2rem;
            border-radius: 23px;
        }

        #modal.hide,
        #fade.hide {
            opacity: 0;
            pointer-events: none;
        }

        #modal.hide {
            top: 0;
        }

        @media (max-width: 1260px) {
            header {
                display: flex;
                margin: 0 auto;
                justify-content: center;
                justify-items: center;
                align-items: center;
                flex-wrap: wrap;
            }

            main {
                display: flex;
                flex-wrap: wrap;
                margin: 0 auto;
                justify-content: center;
                justify-items: center;
                align-items: center;
            }

            #titulo-ajuda {
                display: flex;
                flex-wrap: wrap;
                margin: 0 auto;
                justify-content: center;
                justify-items: center;
                align-items: center;
                font-size: 1rem;
            }

            #titulo-ajuda h1 {
                font-size: 2.9em;
            }

            #titulo-ajuda p {
                font-size: 1.3em;
            }

            #text-coment {
                display: flex;
                flex-wrap: wrap;
                margin: 0 auto;
                justify-content: center;
                justify-items: center;
                align-items: center;
                font-size: 1.3em;
            }
        }

        @media (max-width: 999px) {

            nav a:hover {
                border-bottom: 2px solid #fff;
                color: #fff;
            }

        }
    </style>

</head>


<body>
    <header>
        <p>Pesquisa<font color="#FF8A00"> Hardware</font>
        </p>
        <nav>
            <ul class="menu">
                <li><a href="../../controller/UsuarioController.php?logout=true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <section id="titulo-ajuda">
        <h1>FeedBack<font color="#222222">.</font>
        </h1>
        <p>Fique a vontade para ver e avaliar os produtos listados aqui<font color="#FF8A00">!</font>
        </p>
    </section>

    <section class="table-responsive text-nowrap p-3">
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <th>Nome</th>
                <th>Marca</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th colspan="2">Ações</th>
            </thead>
            <?php foreach ($produtodao->listar() as $produto) : ?>
                <tr>
                    <td><?= $produto->getNome() ?></td>
                    <td><?= $produto->getMarca() ?></td>
                    <td><?= $produto->getDescricao() ?></td>
                    <td><?= $produto->getCategoria() ?></td>
                    <td>
                        <form action="./avaliar.php" method="post" name="feed">
                            <input type="hidden" id="id_feed" name="id_feed" value="<?= $produto->getID() ?>" />
                            <input type="submit" id="avaliar" name="avaliar" value="Avaliar" class="btn btn-warning" />
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </section>

    <!-- <div id="fade" class="hide"></div>
    <div id="modal" class="hide">
        <div class="d-flex justify-content-center mt-5">
            <form id="form" class="rounded-2 bg-white p-5 w-50">
                <h3 class="text-center b-4">Faça seu comentário</h3>

                <div class="mb-3">
                    <label for="inputName" class="form-label">Nome</label>
                    <input class="form-control" id="inputName" placeholder="Seu nome" required>
                </div>

                <div class="mb-3" id="text-coment">
                    <label for="inputText" class="form-label">Seu comentário</label>
                    <textarea class="form-control" id="inputText" rows="3" placeholder="Comente Aqui" required></textarea>
                </div>

                <div class="d-flex justify-content-center ">
                    <button type="submit" class="btn btn-dark px-4 m-2">Enviar</button>
                    <button class="btn btn-dark px-4 m-2" id="closeModal">Voltar</button>
                </div>

            </form>
        </div>

        <div class="d-flex justify-content-center">
            <div class="rounded-2 bg-white p-3 w-50 mt-5 mb-5" id="commentPost">
                <h5 class="text-center mb-3">Comentários</h5>
            </div>
        </div>
    </div> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>