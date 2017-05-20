<?php
    class User
    {
      private $_username;
      private $_email;
      private $_bio;
      private $_portrait;
      private $_blogs[];
      
      function __construct($username="unknown", $email="unknown", $bio="unknown",
                           $portrait="unknown")
      {
          $this->_username = $username;
          $this->_email = $email;
          $this->_bio = $bio;
          $this->_portrait = $portrait;
          $this->_blogs = array();
          
      }
      
      function getUsername()
      {
          return $_username;
      }
      
      function getBio()
      {
          return $_bio;
      }
      
      function getPortrait()
      {
          return $_portrait;
      }
      
      function getAllBlogs()
      {
          return $_blogs;
      }
      
      function addBlog($blog)
      {
        $this->_blogs[] = new Blog($blog);
      }
      
    }