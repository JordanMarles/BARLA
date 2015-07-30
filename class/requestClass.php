<?php

namespace barla\request;

class requestClass {
  
  static public function getParamPost($param) {
    return filter_input(INPUT_POST, $param);
  }
  
  static public function getParamGet($param) {
    return filter_input(INPUT_GET, $param);
  }
  
  static public function hasParamGet($param) {
    return filter_has_var(INPUT_GET, $param);
  }
  
}
