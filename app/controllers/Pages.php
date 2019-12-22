<?php
  class Pages extends Controller {
    public function __construct(){
    }

    // We need to have an index method, otherwise we get an error. The index is the default webpage when we visit it
    public function index() {
      $data = ['title' => 'Welcome'];
      $this -> view('./pages/index', $data);
    }

    public function about() {
      $data = ['title' => 'About Us'];

      $this -> view('./pages/about', $data);
    }
  }

?>