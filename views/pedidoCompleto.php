<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='<?=INITIAL_PATH?>/views/estilo/estilo.css'>
    <title>Pedido Completo!</title>
</head>
<body>

<header>
        <div class="banner">
            <div class="cabecalho">
                <h2 class='left'> <i class="fa fa-anchor" aria-hidden="true"></i> Pedido em andamento! </h2>
                
                <p class='right'>
                <a href='<?= INITIAL_PATH ?>/pedido'>Cancelar pedido! </a> </p>
            </div><!--cabecalho-->
            <div class="clear"></div>
        </div><!--baner-->

</header>


<section class="itens">
    <div class="banner">

    <h3>Seus pedidos:</h3>
    <hr>
    <table>
        <?php
        foreach($_SESSION['carrinho'] as $key => $value){
            $item = deliveryModel::getItem($key)
        ?>
        <tr>
            <td> <?= $item['nome'] ?></td>
            <td> QTD: <?= $value?></td>
            <td> R$ <?= str_replace('.',',',number_format($item['preco'] * $value,2)) ?></td>
        </tr>

        <?php
            
            }     
        ?>

        <tr>
            <td></td>
            <td></td>
            <td> Total: R$ <?= str_replace('.',',',number_format(deliveryModel::precoTotal(),2))?></td>
        </tr>

    </table>


    <div class="pagamento">
            <p>Opção de pagamento: <?= $_SESSION['opcao_pagamento'] ?></p>
            <?php if($_SESSION['opcao_pagamento'] == 'dinheiro'){
                if($_SESSION['sem_troco']){
                    echo "Sem necessidade de troco";
                } else {
                    $troco = $_SESSION['troco'] - deliveryModel::precoTotal();
                    echo 'Troco: R$' . str_replace('.',',',number_format($troco,2)); 
                }}?>

    </div><!--pagamento-->


    <div class="fim">
            <a href='<?= INITIAL_PATH ?>/finalizar'> Pedido entregue! </a>
    </div><!--fim-->
    </div><!--banner-->
</section><!--itens-->


</body>
</html>