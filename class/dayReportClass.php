<?php

namespace barla\dayReport {

  class dayReportClass {
    
    const SESSION_TONICO = 'sessionDayReportTonico';
    const SESSION_JABON = 'sessionDayReportJabon';
  
    static public function setTonico($quantity) {
      if(isset($_SESSION[self::SESSION_TONICO]) === true) {
        $_SESSION[self::SESSION_TONICO] += $quantity;
      } else {
        $_SESSION[self::SESSION_TONICO] = $quantity;
      }
    }
    
    static public function setJabon($quantity) {
      if(isset($_SESSION[self::SESSION_JABON]) === true) {
        $_SESSION[self::SESSION_JABON] += $quantity;
      } else {
        $_SESSION[self::SESSION_JABON] = $quantity;
      }
    }
    
    static public function getTonico() {
      return (isset($_SESSION[self::SESSION_TONICO]) === true) ? $_SESSION[self::SESSION_TONICO] : 0;
    }
    
    static public function getJabon() {
      return (isset($_SESSION[self::SESSION_JABON]) === true) ? $_SESSION[self::SESSION_JABON] : 0;
    }
    
    static public function calcProfit($quantity, $sale, $production) {
      return ($quantity * $sale) - ($quantity * $production);
    }
  
  }

}