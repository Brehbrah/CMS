<?php

  // Core.php is going to take care of our URLs. What needs to be pulled off, such like /post/1 etc. It will takes those out and create
  // an array from them. It will decide if it's going to load as a controller, a method, a parameter etc. 
  // This is our core of the framework

  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      //print_r($this->getUrl());

      $url = $this->getUrl();

      // Look in controllers for first value
      if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check for second part of URL
      if(isset($url[1])) {
        // Check to see if method exists in controller 
        if(method_exists($this -> currentController, $url[1])) {
          $this -> currentMethod = $url[1];
          // Unset 1 index in order if we want to use e.g. about/whatever_in_here
          unset($url[1]);
        }
      }

      // Get paramts
      $this -> params = $url ? array_values($url) : [];

      // Call a callback with array of params
      call_user_func_array([$this -> currentController, $this -> currentMethod], $this -> params);

    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  } 
  
  