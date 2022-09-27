<?php

    class ProdutoDao {
        public function criar(Produto $produto) {
            try {
                $sql = "INSERT INTO produto (nome, marca, descricao, categoria) VALUES (:nome, :marca, :descricao, :categoria)";

                $stmt = Conexao::getConexao() -> prepare($sql);
                $stmt -> bindValue(":nome", $produto -> getNome(), PDO::PARAM_STR);
                $stmt -> bindValue(":marca", $produto -> getMarca(), PDO::PARAM_STR);
                $stmt -> bindValue(":descricao", $produto -> getDescricao(), PDO::PARAM_STR);
                $stmt -> bindValue(":categoria", $produto -> getCategoria(), PDO::PARAM_STR);

                return $stmt -> execute();
            } catch (PDOException $error) {
                echo 'Erro ao inserir produto' . $error -> getMessage();
            }
        }

        private function listaProdutos($linhas) {

            $produto = new Produto();
            $produto -> setID($linhas['id_produto']);
            $produto -> setNome($linhas['nome']);
            $produto -> setMarca($linhas['marca']);
            $produto -> setDescricao($linhas['descricao']);
            $produto -> setCategoria($linhas['categoria']);
    
            return $produto;
        }

        public function listar() {
            try {
                $sql = "SELECT * FROM produto order by nome asc";
                $stmt = Conexao::getConexao() -> query($sql);
                $lista = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                $list = array();
    
                foreach ($lista as $linha) {
                    $list[] = $this->listaProdutos($linha);
                }
    
                return $list;
    
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
            }
        }

        public function editar() {
            try {
                $sql = "SELECT * FROM produto WHERE id_produto = :id";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":id", $_POST['id_edit'], PDO::PARAM_INT);
                $stmt->execute();
                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
    
                foreach ($lista as $linha) {
                    $list[] = $this->listaProdutos($linha);
                }
    
                return $list;
    
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage();
            }
    
        }

        public function alterar(Produto $produto) {
            try {
                $sql = "UPDATE produto SET nome = :nome, marca = :marca, descricao = :descricao, categoria = :categoria WHERE id_produto = :id";
    
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt -> bindValue(":id", $produto -> getID(), PDO::PARAM_INT);
                $stmt -> bindValue(":nome", $produto -> getNome(), PDO::PARAM_STR);
                $stmt->bindValue(":marca", $produto -> getMarca(), PDO::PARAM_STR);
                $stmt->bindValue(":descricao", $produto -> getDescricao(), PDO::PARAM_STR);
                $stmt->bindValue(":categoria", $produto -> getCategoria(), PDO::PARAM_STR);
    
                return $stmt->execute();
    
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao tentar atualizar Produto." . $e->getMessage();
            }
        }

        public function excluir(Produto $produto) {
            try {
    
                $sql = "DELETE FROM produto WHERE id_produto= :id";
                $stmt = Conexao::getConexao() -> prepare($sql);
                $stmt -> bindValue(":id", $produto->getID(), PDO::PARAM_INT);
                return $stmt -> execute();
    
            } catch (PDOException $e) {
                echo "Erro ao Excluir produto" . $e -> getMessage();
            }
        }
    }

?>