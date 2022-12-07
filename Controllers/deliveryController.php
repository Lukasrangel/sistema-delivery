<?php


class deliveryController {

    public function index(){
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        $page = explode('/', $url)[0];
        
        if(isset($_POST['pedir!'])){
            self::pedir();
        }

        if(isset($_GET['addCart'])){
            $id = (int) $_GET['addCart'];
            deliveryModel::addCart($id);
        }

        if(file_exists('views/'.$page.'.php')){
            include('views/'.$page.'.php');
        } else {
            echo "Página não existe!";
        }
    }

    public function pedir(){
        if(!isset($_SESSION['carrinho'])){
            header("Location: " . INITIAL_PATH);
        }
        
        $opcao = $_POST['opcao'];
        $_SESSION['troco'] = $_POST['troco'];
        $_SESSION['opcao_pagamento'] = $_POST['opcao'];
        $_SESSION['sem_troco'] = isset($_POST['sem_troco']) & @$_POST['sem_troco'] == 'on' ? True : False;

        if($opcao == 'dinheiro'){
            if($_POST['troco'] > $_SESSION['precoTotal'] & isset($_POST['troco']) || @$_POST['sem_troco'] == 'on'){
                header("Location: " . INITIAL_PATH . '/pedidoCompleto');
            } else {
                echo "<script>alert('Troco inválido')</script>";
            }
        }


    }

}

?>