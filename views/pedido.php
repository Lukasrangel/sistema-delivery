<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='http://127.0.0.1/luks_dev/estilo/fontawesome/css/all.min.css'>
    <link rel='stylesheet' href='http://127.0.0.1/delivery/views/estilo/estilo.css'>
    <title>Pedidão mucho loko</title>
</head>
<body>
    <header>
        <div class="banner">
            <div class="cabecalho">
                <h2 class="left"> Seu pedido </h2>

                <p class="right"> <a href='<?= INITIAL_PATH ?>'> Voltar ao delivery </a></p>
            </div><!--cabecalho-->
        </div><!--banner-->
    </header>
    
    <?php 
print_r($_SESSION['carrinho']);
 ?>
    <section class="pedidos">
        <div class="banner">

            <table>

            <?php

                foreach($_SESSION['carrinho'] as $key => $value){
                    $item = deliveryModel::getItem($key);
            ?>
                <tr id='id<?= $key ?>'>
                    <td> <?= $item['nome'] ?></td>
                    <td> QTD: <?= $value?></td>
                    <td> R$ <?= str_replace('.',',',number_format($item['preco'] * $value,2)) ?></td>
                    <td> <i onclick=deleteList(<?=$key?>) class="fa fa-times"></i></td>
                </tr>

            <?php
            @$precoTotal = deliveryModel::precoTotal();
            $_SESSION['precoTotal'] = $precoTotal;
                }
               
            ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id='preco'> Total: R$  <?= @str_replace('.',',', number_format($precoTotal,2)); ?> </td>
                </tr>
            </table>
        </div><!--banner-->
    </section><!--pedidos-->

    <section class='pagamento'>
        <div class="banner">

        <form method='post' action=''>
            <p>Forma de pagamento:</p>

            <select name='opcao'>
                <option value='dinheiro'> Dinheiro </option>
                <option value='cartao_credito'> Cartão de Crédito </option>
                <option value='cartao_debito'> Cartão de Débito </option>
            </select>
        

            <div class="troco">
                <label>
                    Troco para:
                </label>
                <input type='number' name='troco'>
                <label> Não preciso de troco:   <input type='checkbox' name='sem_troco'> </label>
              
            </div><!--troco-->

        <input type='submit' name='pedir!' value='Fechar Pedido!'>
        </form>
        </div><!--banner-->
    </section>

</body>

<script src='<?= INITIAL_PATH ?>/js/scripts.js'> </script>

</html>