<?php
session_start();

require("Controllers/deliveryController.php");
require("Models/deliveryModel.php");

define("INITIAL_PATH", 'http://127.0.0.1/delivery');

$controller = new deliveryController();


$controller->index();

?>