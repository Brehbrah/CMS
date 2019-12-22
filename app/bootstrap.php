<?php
  // Load Config
  require_once 'config/config.php';

  // Autoload Core Libraries (shortcut way to load the libraries, instead of hardcoding the libraries) 
  spl_autoload_register(function($className) {
    require_once 'libraries/' . $className . '.php';
  }); 

?>
