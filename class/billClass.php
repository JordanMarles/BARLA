<?php

namespace barla\bill;

use barla\tonico\tonicoClass as tonico;
use barla\jabon\jabonClass as jabon;

class billClass {

  const COMPANY = 'Perro Rojo';
  const NIT = '17897654-2';
  const IVA = 0.9;
  const SESSION_TONICO = 'sessionBillTonico';
  const SESSION_JABON = 'sessionBillJabon';
  const SESSION_CLIENT_NAME = 'sessionClientName';
  const SESSION_CLIENT_ID = 'sessionClientId';

  private $nameClient;
  private $idClient;
  private $quantityTonico;
  private $quantityJabon;

  public function __construct($nameClient = null, $idClient = null) {
    $this->setNameClient($nameClient);
    $this->setIdClient($idClient);

    $this->quantityTonico = (isset($_SESSION[self::SESSION_TONICO]) === true) ? $_SESSION[self::SESSION_TONICO] : 0;

    if (isset($_SESSION[self::SESSION_JABON]) === true) {
      $this->quantityJabon = $_SESSION[self::SESSION_JABON];
    } else {
      $this->quantityJabon = 0;
    }
  }

  public function getNameClient() {
    if ($this->nameClient === null) {
      $this->nameClient = (isset($_SESSION[self::SESSION_CLIENT_NAME]) === true) ? $_SESSION[self::SESSION_CLIENT_NAME] : null;
    }
    return $this->nameClient;
  }

  public function getIdClient() {
    if ($this->idClient === null) {
      if (isset($_SESSION[self::SESSION_CLIENT_ID]) === true) {
        $this->idClient = $_SESSION[self::SESSION_CLIENT_ID];
      } else {
        $this->idClient = null;
      }
    }
    return $this->idClient;
  }

  public function setNameClient($nameClient) {
    $this->nameClient = $nameClient;
    if ($nameClient !== null) {
      $_SESSION[self::SESSION_CLIENT_NAME] = $nameClient;
    }
  }

  public function setIdClient($idClient) {
    $this->idClient = $idClient;
    if ($idClient !== null) {
      $_SESSION[self::SESSION_CLIENT_ID] = $idClient;
    }
  }

  public function setTonico($quantity) {
    $answer = false;
    $tonico = new tonico();
    if ($tonico->getStock() >= $quantity) {
      $this->sellTonico($quantity, $tonico);
      $answer = true;
    }
    return $answer;
  }

  private function sellTonico($quantity, tonico $tonico) {
    $this->quantityTonico += $quantity;
    if (isset($_SESSION[self::SESSION_TONICO]) === true) {
      $_SESSION[self::SESSION_TONICO] += $quantity;
    } else {
      $_SESSION[self::SESSION_TONICO] = $quantity;
    }
    $tonico->subtractStock($quantity);
  }

  public function setJabon($quantity) {
    $answer = false;
    $jabon = new jabon();
    if ($jabon->getStock() >= $quantity) {
      $this->sellJabon($quantity, $jabon);
      $answer = true;
    }
    return $answer;
  }

  private function sellJabon($quantity, jabon $jabon) {
    $this->quantityJabon += $quantity;
    if (isset($_SESSION[self::SESSION_JABON]) === true) {
      $_SESSION[self::SESSION_JABON] += $quantity;
    } else {
      $_SESSION[self::SESSION_JABON] = $quantity;
    }
    $jabon->subtractStock($quantity);
  }

  public function getTonico() {
    return $this->quantityTonico;
  }

  public function getJabon() {
    return $this->quantityJabon;
  }

  public function cancel() {
    $quantityTonico = $this->getTonico();
    $quantityJabon = $this->getJabon();
    $this->setJabon((-1 * $quantityJabon));
    $this->setTonico((-1 * $quantityTonico));
    unset($_SESSION[self::SESSION_JABON]);
    unset($_SESSION[self::SESSION_TONICO]);
  }

  public function printBill() {
    // cuando no separo el espacio de nombre debo colocar
    // todo el espacio de nombre donde la clase ha sido definida
    \barla\routing\routingClass::redirect('../bill.php');
  }

  public function process() {
    $tonico = new tonico();
    $jabon = new jabon();
    // cantidad de camisas * costo de venta de una camisa
    $valorTotalTonico = $this->getTonico() * $tonico->getSalePrice();
    $_SESSION['valorTotalTonico'] = $valorTotalTonico;
    // estoy pasando la cantidad de camisas compradas al reporte del día
    \barla\dayReport\dayReportClass::setTonico($this->getTonico());
    
    $valorTotalJabon = $this->getJabon() * $jabon->getSalePrice();
    $_SESSION['valorTotalJabon'] = $valorTotalJabon;
    // estoy pasando la cantidad de pantalones compradas al reporte del día
    \barla\dayReport\dayReportClass::setJabon($this->getJabon());

    $subTotal = $valorTotalTonico + $valorTotalJabon;
    $_SESSION['subTotal'] = $subTotal;

    //-------------------
    // parametrización
    $totalIVA = $subTotal * self::IVA;
    $_SESSION['totalIVA'] = $totalIVA;

    $granTotal = $subTotal + $totalIVA;
    $_SESSION['granTotal'] = $granTotal;
  }

  static public function getValorTotalTonico() {
    return (isset($_SESSION['valorTotalTonico']) === true) ? $_SESSION['valorTotalTonico'] : 0;
  }

  static public function getValorTotalJabon() {
    return (isset($_SESSION['valorTotalJabon']) === true) ? $_SESSION['valorTotalJabon'] : 0;
  }

  static public function getSubTotal() {
    return (isset($_SESSION['subTotal']) === true) ? $_SESSION['subTotal'] : 0;
  }

  static public function getTotalIVA() {
    return (isset($_SESSION['totalIVA']) === true) ? $_SESSION['totalIVA'] : 0;
  }

  static public function getGranTotal() {
    return (isset($_SESSION['granTotal']) === true) ? $_SESSION['granTotal'] : 0;
  }

  static public function delete() {
    unset(
            $_SESSION['sessionBillJabon'], $_SESSION['sessionBillTonico'], $_SESSION['sessionClientName'], $_SESSION['sessionClientId'], $_SESSION['valorTotalTonico'], $_SESSION['valorTotalJabon'], $_SESSION['subTotal'], $_SESSION['totalIVA'], $_SESSION['granTotal']
    );
  }

}
