<?php
    class User
    {
      private $title;
      private $entry;
      private $date;
      
      function __construct($title="unknown", $entry="unknown")
      {
        $this->title = $title;
        $this->entry = $entry;
        $this->date = date("m/d/y");       
      }
      
      function getTitle()
      {
          return $username;
      }
      
      function getEntry()
      {
          return $bio;
      }
      
      function getDate()
      {
          return $portrait;
      }
      
      function setTitle($title)
      {
          $this->title = $title;
      }
      
      function setEntry($entry)
      {
          $this->entry = $entry;
      }
      
      function setDate()
      {
          $this->date = date("m/d/y");  
      }
      
      
    }