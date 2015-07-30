<?php

session_start();

include '../class/routingClass.php';
include '../class/productClass.php';
include '../class/shirtClass.php';
include '../class/pantsClass.php';
include '../class/billClass.php';

use albertovo7\routing\routingClass as routing;
use albertovo7\bill\billClass as bill;

$bill = new bill();
$bill->cancel();
routing::redirect('../mainMenu.php');