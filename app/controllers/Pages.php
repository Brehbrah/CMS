<?php
  class Pages {
    public function __construct(){
    }

    // We need to have an index method, otherwise we get an error. The index is the default webpage when we visit it
    public function index() {

    }

    public function about($id) {

      echo $id;
    }
  }

?>