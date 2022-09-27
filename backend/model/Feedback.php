<?php

    class Feedback {

        private $id;
        private $id_user;
        private $id_prod;
        private $nome;
        private $data;
        private $nota;
        private $comentario;

        // ============ GET ============

        function getID() {
            return $this -> id;
        }

        function getID_USER() {
            return $this -> id_user;
        }

        function getID_PROD() {
            return $this -> id_prod;
        }

        function getNome() {
            return $this -> nome;
        }

        function getData() {
            return $this -> data;
        }

        function getNota() {
            return $this -> nota;
        }

        function getComentario() {
            return $this -> comentario;
        }

        // ============ SET ============

        function setID($id) {
            $this -> id = $id;
        }

        function setID_USER($id_user) {
            $this -> idUsuario = $id_user;
        }

        function setID_PROD($id_prod) {
            $this -> idProduto = $id_prod;
        }

        function setNome($nome) {
            $this -> nome = $nome;
        }

        function setData($data) {
            $this -> marca = $data;
        }

        function setNota($nota) {
            $this -> nota = $nota;
        }

        function setComentario($comentario) {
            $this -> comentario = $comentario;
        }

    }

?>