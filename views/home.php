<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='http://127.0.0.1/luks_dev/estilo/fontawesome/css/all.min.css'>
    <link rel='stylesheet' href='http://127.0.0.1/delivery/views/estilo/estilo.css'>
    <title>Delivery System - Luks Dev</title>
</head>
<body>

    <header>
        <div class="banner">
            <div class="cabecalho">
                <h2 class='left'> <i class="fa fa-anchor" aria-hidden="true"></i> Faça seu pedido! </h2>
                
                <p class='right'> Items: 
                (<?php echo @deliveryModel::contarItems()?>) <a href='<?= INITIAL_PATH ?>/pedido'>Fechar pedido! </a> </p>
            </div><!--cabecalho-->
            <div class="clear"></div>
        </div><!--baner-->

    </header>

    <section class="produtos">
        <div class="banner">

        <?php
        $items = deliveryModel::$items;

        foreach($items as $item){
        ?>
            <div class="produto-single w33 left">
                <div class="banner">
                    <div class="produto-image">
                        <img src='<?= INITIAL_PATH ?>/views/images/<?= $item['img']; ?>'>
                    </div><!--produto-image-->
                    <div class="produto-infos">
                        <p> <?= $item['nome']; ?></p>
                        <p> R$ <?= str_replace(".",",",number_format($item['preco'],2)); ?> </p>
                        <a href='?addCart=<?= $item['id']?>'>Adicionar Carrinho</a>
                    </div><!--produto-infos-->
                </div><!--banner-->    
            </div><!--produto-single-->
        <?php
        }
        ?>
            
        </div>
    </section><!--produtos-->
    <div class="clear"></div>
    
</body>
</html>