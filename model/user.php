<?php
    class User
    {
      private $username;
      private $email;
      private $bio;
      private $portrait;
      private $blogs[];
      
      function __construct($username="unknown", $email="unknown", $bio="unknown",
                           $portrait="unknown")
      {
          $this->username = $username;
          $this->email = $email;
          $this->bio = $bio;
          $this->portrait = $portrait;
          $this->blogs = array();
          
      }
      
      function getUsername()
      {
          return $username;
      }
      
      function getBio()
      {
          return $bio;
      }
      
      function getPortrait()
      {
          return $portrait;
      }
      
      function getAllBlogs()
      {
          return $blogs;
      }
      
      function addBlog($blog)
      {
        $this->blogs[] = new Blog($blog);
      }
      
    }