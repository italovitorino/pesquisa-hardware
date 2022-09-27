<?php

    class Conexao{
        protected static $conexao;     

        private function __construct(){
            $db_host = "sql109.epizy.com";
            $db_nome = "epiz_32671942_pesquisa_hardware";
            $db_usuario = "epiz_32671942";
            $db_senha = "H3uaF3FNL1jjz";
            $db_driver = "mysql";

            try {
                self::$conexao = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
                self::$conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexao -> exec('SET NAMES utf8');

                // echo "Conexão estabelecida com sucesso!";

            } catch (PDOException $error) {
                echo "Erro na conexão com o banco de dados" . $error -> getMessage();
            }
        }

        public static function getConexao() {
            if(!self::$conexao) {
                new Conexao();
            }
            return self::$conexao;
        }
    }

?>