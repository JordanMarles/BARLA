<?php

session_start();

include '../class/requestClass.php';
include '../class/routingClass.php';
include '../class/productClass.php';
include '../class/tonicoClass.php';
include '../class/billClass.php';

use barla\request\requestClass as request;
use barla\routing\routingClass as routing;
use barla\bill\billClass as bill;

$quantity = request::getParamPost('inputCantidadTonico');
$bill = new bill();
if ($bill->setTonico($quantity) === true) {
  routing::redirect('../sell.php');
} else {
  routing::redirect('../sell.php?tonico=false');
}

