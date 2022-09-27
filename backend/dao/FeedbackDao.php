<?php

    class FeedbackDao {
        public function criar(Produto $produto) {
            try {
                $sql = "INSERT INTO feedback (data_avaliacao, nota, comentario) VALUES (:data_avaliacao)";

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
    }

?>