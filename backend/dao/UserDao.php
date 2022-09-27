<?php

    class UserDao {

        public function criar(Usuario $usuario) {
            try {
                $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";

                $stmt = Conexao::getConexao() -> prepare($sql);
                $stmt -> bindValue(":nome", $usuario -> getNome(), PDO::PARAM_STR);
                $stmt -> bindValue(":email", $usuario -> getEmail(), PDO::PARAM_STR);
                $stmt -> bindValue(":senha", $usuario -> getSenha(), PDO::PARAM_STR);

                return $stmt -> execute();

            } catch (PDOException $error) {
                echo "Erro ao inserir usuario" . $error -> getMessage();
            }
        }

        private function listaUsuarios($linhas) {

            $usuario = new Usuario();
            $usuario->setID($linhas['id_usuario']);
            $usuario->setNome($linhas['nome']);
            $usuario->setEmail($linhas['email']);
            $usuario->setSenha($linhas['senha']);
    
            return $usuario;
        }

        public function user() {
            try {
                $sql = "SELECT * FROM usuario WHERE id_usuario = :id";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":id", $_SESSION['user_session'] , PDO::PARAM_INT);
                $stmt->execute();
                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
    
                foreach ($lista as $linha) {
                    $list[] = $this->listaUsuarios($linha);
                }
    
                return $list;
    
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage();
            }
    
        }

        public function login(Usuario $usuario) {
            try {
                $sql = "SELECT * FROM usuario WHERE email = :email";
                $stmt = Conexao::getConexao() -> prepare($sql);
                $stmt -> bindValue(":email", $usuario -> getEmail(), PDO::PARAM_STR);
                $stmt -> execute();
                $user_linha = $stmt -> fetch(PDO::FETCH_ASSOC);
                        
                if($stmt -> rowCount() == 1) {
    
                    if(password_verify($usuario -> getSenha(), $user_linha['senha'])) {

                        $_SESSION['user_session'] = $user_linha['id_usuario'];
                        session_start();
                        return true;    
                        
                    } else {
                        return false;
                    }
                }
            }
            catch(PDOException $error) {
    
                echo "Erro ao tentar realizar o login do usuario" . $error -> getMessage();
            }
        }

        public function checkLogin() {
            if(isset($_SESSION['user_session'])) {
                return true;
            } else {
                return false;
            }
        }

        public function logout() {
            session_start();
            session_destroy();
            unset($_SESSION['user_session']);
            return true;
        }
    } 

?>