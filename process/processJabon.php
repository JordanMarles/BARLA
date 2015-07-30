<?php

session_start();

include '../class/requestClass.php';
include '../class/routingClass.php';
include '../class/productClass.php';
include '../class/jabonClass.php';
include '../class/billClass.php';

use barla\request\requestClass as request;
use barla\routing\routingClass as routing;
use barla\bill\billClass as bill;

$quantity = request::getParamPost('inputCantidadJabon');
$bill = new bill();
if ($bill->setJabon($quantity) === true) {
  routing::redirect('../sell.php');
} else {
  routing::redirect('../sell.php?jabon=false');
}

