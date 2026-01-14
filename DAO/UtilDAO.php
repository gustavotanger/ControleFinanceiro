<?php

    class UtilDAO{

        private static function IniciarSessao(){
            if(!isset($_SESSION)){
                session_start();
            }
        }

        public static function CriarSessao($cod, $nome){
            self::IniciarSessao();

            $_SESSION['cod'] = $cod;
            $_SESSION['nome'] = $nome;
        }

        public static function NomeLogado(){
            self::IniciarSessao();

            return $_SESSION['nome'];
        }
        
        public static function UsuarioLogado(){
            // Esse return 1 simula o acesso do usuário via banco de dados,
            // cuja o ID dele é o 1.
            self::IniciarSessao();

            return $_SESSION['cod'];
        }

        public static function Deslogar(){
            self::IniciarSessao();

            unset($_SESSION['cod']);
            unset($_SESSION['nome']);

            header('location: index.php');
            exit;
        }

        public static function VerificarLogado(){
            self::IniciarSessao();

            if(!isset($_SESSION['cod']) || $_SESSION['cod'] == ''){
                header('location: index.php');
                exit;
            }
        }
    }