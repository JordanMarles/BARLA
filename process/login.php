<?php

include '../class/requestClass.php';
include '../class/securityClass.php';
include '../class/routingClass.php';

use barla\request\requestClass as request;
use barla\security\securityClass as security;
use barla\routing\routingClass as routing;

$user = request::getParamPost('inputUser');
$pass = request::getParamPost('inputPassword');

if (security::verifyUserAndPassword($user, $pass) === true) {
  routing::redirect('../mainMenu.php');
} else {
  routing::redirect('../index.php?user=false');
}

