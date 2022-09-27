<?php

    class Produto {

        private $id;
        private $nome;
        private $marca;
        private $descricao;
        private $categoria;

        // ============ GET ============

        function getID() {
            return $this -> id;
        }

        function getNome() {
            return $this -> nome;
        }

        function getMarca() {
            return $this -> marca;
        }

        function getDescricao() {
            return $this -> descricao;
        }

        function getCategoria() {
            return $this -> categoria;
        }

        // ============ SET ============

        function setID($id) {
            $this -> id = $id;
        }

        function setNome($nome) {
            $this -> nome = $nome;
        }

        function setMarca($marca) {
            $this -> marca = $marca;
        }

        function setDescricao($descricao) {
            $this -> descricao = $descricao;
        }

        function setCategoria($categoria) {
            $this -> categoria = $categoria;
        }

    }

?>