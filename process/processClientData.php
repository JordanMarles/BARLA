<?php

session_start();

include '../class/requestClass.php';
include '../class/routingClass.php';
include '../class/billClass.php';

use barla\request\requestClass as request;
use barla\routing\routingClass as routing;
use barla\bill\billClass as bill;

$clientId = request::getParamPost('inputId');
$clientName = request::getParamPost('inputName');

$bill = new bill($clientName, $clientId);

routing::redirect('processBill.php');
