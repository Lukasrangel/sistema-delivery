<?php
session_start();

require("../../Models/deliveryModel.php");
define("INITIAL_PATH", 'http://127.0.0.1/delivery');

if(isset($_GET['id'])){
        $id = $_GET['id'];
        unset($_SESSION['carrinho'][$id]);

        $_SESSION['precoTotal'] = deliveryModel::precoTotal();
        $retorno['precoTotal'] = $_SESSION['precoTotal'];
        $retorno['sucesso'] = True;
        echo json_encode($retorno);
}

?>