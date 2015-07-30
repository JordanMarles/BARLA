<?php

namespace barla\jabon;

use barla\product\productClass as product;

class jabonClass extends product {
  
  const SESSION = 'sessionjabonStock';

  public function __construct() {
    $this->setName('Jabon');
    $this->setProductionPrice(3);
    $this->setSalePrice(10);
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
