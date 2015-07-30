<?php

namespace barla\product;

class productClass {
  
  private $name;
  private $stock;
  private $salePrice;
  private $productionPrice;
  
  public function getName() {
    return $this->name;
  }

  public function getStock() {
    return $this->stock;
  }

  public function getSalePrice() {
    return $this->salePrice;
  }

  public function getProductionPrice() {
    return $this->productionPrice;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setStock($stock) {
    $this->stock = $stock;
  }

  public function setSalePrice($salePrice) {
    $this->salePrice = $salePrice;
  }

  public function setProductionPrice($productionPrice) {
    $this->productionPrice = $productionPrice;
  }
  
}
