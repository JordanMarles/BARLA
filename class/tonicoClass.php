<?php

namespace barla\tonico;

use barla\product\productClass as product;

class tonicoClass extends product {

  const SESSION = 'sessionTonicoStock';

  public function __construct() {
    $this->setName('Tonico');
    $this->setProductionPrice(9);
    $this->setSalePrice(25);
    if (isset($_SESSION[self::SESSION]) === true) {
      $this->setStock($_SESSION[self::SESSION]);
    } else {
      $this->setStock(200);
      $_SESSION[self::SESSION] = 200;
    }
  }

  public function subtractStock($quantity) {
    $_SESSION[self::SESSION] -= $quantity;
    $this->setStock($_SESSION[self::SESSION]);
  }

}
