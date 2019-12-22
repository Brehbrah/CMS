<?php
  class Pages extends Controller {
    public function __construct(){
      $this -> postModel = $this -> model('Post');
    }

    // We need to have an index method, otherwise we get an error. The index is the default webpage when we visit it
    public function index() {
      $posts = $this -> postModel -> getPosts();

      $data = [
        'title' => 'Welcome',
        'posts' => $posts

      ];

      $this -> view('./pages/index', $data);
    }

    public function about() {
      $data = ['title' => 'About Us'];

      $this -> view('./pages/about', $data);
    }
  }

?>