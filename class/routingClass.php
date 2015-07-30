<?php

namespace barla\routing;

class routingClass {
  
  static public function redirect($url) {
    header('Location: ' . $url);
    exit();
  }
  
}
