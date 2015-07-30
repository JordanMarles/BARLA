<?php

session_start();

include '../class/routingClass.php';
include '../class/productClass.php';
include '../class/jabonClass.php';
include '../class/tonicoClass.php';
include '../class/billClass.php';
include '../class/dayReportClass.php';

use barla\routing\routingClass as routing;
use barla\bill\billClass as bill;

$bill = new bill();
$bill->process();
$bill->printBill();