<?php


class deliveryModel {

    public static $items = array(array('id'=>0,'nome'=>'Sushi 1', 'img'=>'sushi1.jpeg','preco'=>28.70),
                            array('id'=>1,'nome'=>'Sushui 2','img'=>'sushi2.jpeg','preco'=>21.70),
                            array('id'=>2,'nome'=>'Sushi 3','img'=>'sushi3.jpeg','preco'=> 19.90));
    

    public static function listarSushis(){
        return self::$items;
    }

    public static function getItem($id){
        $item = self::$items[$id];
        return $item;
    }


    public static function contarItems(){
        $items = 0;
        foreach($_SESSION['carrinho'] as $item ){
            $items += $item;
        }
        return $items;
    }


    public static function addCart($id){
        
        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = array();
        } 

        if(!isset($_SESSION['carrinho'][$id])){
            $_SESSION['carrinho'][$id] = 1;
        } else {
            $_SESSION['carrinho'][$id]++;
        }
          
        echo "<script>alert('Bagulho adicionado no carrinho!')</script>";
    }

    public static function precoTotal(){
        $precoTotal = 0; 
        foreach($_SESSION['carrinho'] as $key => $value){
            (float) $precoTotal += self::$items[$key]['preco'] * $value; 
        }
        return (float) $precoTotal;
    }
}


?>