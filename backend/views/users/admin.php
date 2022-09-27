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

if (!$login->checkLogin() || $id != 1) {
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

    <link rel="stylesheet" href="../../../frontend/admin/style.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script>
        function deletar() {
            ok = confirm("Tem certeza que deseja deletar estes dados??");
            if (ok) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>

<body>
    <header class="d-flex align-items-center ">
        <p>Pesquisa<span id="ponto"> Hardware</span></p>
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

    <main>

        <h2 class="text-center pt-3">Bem vindo(a), essa é a sua pagina de administrador</h2>

        <div class="button">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarProduto">
                Cadastrar novo produto
            </button>
        </div>

        <div class="modal fade" id="cadastrarProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar produto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="../../controller/ProdutoController.php" method="post" enctype="multipart/form-data" name="cad">
                            <label> Nome: </label>
                            <input class="input-group mb-3 p-2" type="text" id="nome" name="nome" required />
                            <label> Marca: </label>
                            <input class="input-group mb-3 p-2" type="text" id="marca" name="marca" required />
                            <label>Descrição</label>
                            <textarea class="form-control" aria-label="With textarea" name="descricao" id="" cols="30" rows="10"></textarea>
                            <label> Categoria: </label>
                            <input class="input-group p-2" type="text" id="categoria" name="categoria" required />
                            <input type="submit" class="btn btn-success mt-3" id="cadastrar" name="cadastrar" value="Cadastrar" />
                            <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Fechar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section class="table-responsive text-nowrap p-3">
            <table class="table table-striped text-center">
                <thead class="table-dark">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th colspan="2">Ações</th>
                </thead>
                <?php foreach ($produtodao->listar() as $produto) : ?>
                    <tr>
                        <td><?= $produto->getID() ?></td>
                        <td><?= $produto->getNome() ?></td>
                        <td><?= $produto->getMarca() ?></td>
                        <td><?= $produto->getDescricao() ?></td>
                        <td><?= $produto->getCategoria() ?></td>
                        <td>
                            <form action="../../controller/ProdutoController.php" method="post" name="del">
                                <input type="hidden" id="id_del" name="id_del" value="<?= $produto->getID() ?>" />
                                <input type="submit" id="excluir" name="excluir" value="EXCLUIR" class="btn btn-danger" onclick="return deletar()" />
                            </form>
                        </td>
                        <td>
                            <form action="../produto/alterar.php" method="post" name="edit">
                                <input type="hidden" id="id_edit" name="id_edit" value="<?= $produto->getID() ?>" />
                                <input type="submit" id="editar" name="editar" value="EDITAR" class="btn btn-warning" />
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </section>
    </main>

    <!-- <footer>
        <section class="footer-conteudo">
            <h3>Pesquisa<span id="ponto"> Hardware</span></h3>
        </section>
        <nav>
            <ul class="menu-footer">
                <img src="" alt="">
                <li><a>Duvídas</a></li>
                <img src="" alt="">
                <li><a>Contato</a></li>
            </ul>
        </nav>
        <section class="footer-conteudo" class="copy-footer">
            <p>Copyright &copy;2022 PesquisaHardware. Design by Equipe I Love Coding</p>
        </section>
    </footer> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>