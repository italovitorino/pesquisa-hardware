<?php

    class Usuario {
        private $id;
        private $nome;
        private $email;
        private $senha;

        // ============ GET ============

        function getID() {
            return $this -> id;
        }

        function getNome() {
            return $this -> nome;
        }

        function getEmail() {
            return $this -> email;
        }

        function getSenha() {
            return $this -> senha;
        }

        // ============ SET ============

        function setID($id) {
            $this -> id = $id;
        }

        function setNome($nome) {
            $this -> nome = $nome;
        }

        function setEmail($email) {
            $this -> email = $email;
        }

        function setSenha($senha) {
            $this -> senha = $senha;
        }
    }

?>