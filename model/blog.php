<?php
    class Blog
    {
      private $_title;
      private $_entry;
      private $_date;
      
      function __construct($title="unknown", $entry="unknown")
      {
        $this->_title = $title;
        $this->_entry = $entry;
        $this->_date = date("m/d/y");       
      }
      
      function getTitle()
      {
          return $_username;
      }
      
      function getEntry()
      {
          return $_bio;
      }
      
      function getDate()
      {
          return $_portrait;
      }
      
      function setTitle($title)
      {
          $this->_title = $title;
      }
      
      function setEntry($entry)
      {
          $this->_entry = $entry;
      }
      
      function setDate()
      {
          $this->_date = date("m/d/y");  
      }
      
      
    }