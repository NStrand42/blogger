<?php
    class Blog
    {
      private $_title;
      private $_entry;
      private $_date;
      
      private $_pdo;
      
      function __construct($title="unknown", $entry="unknown")
      {
       //Require configuration file
        require_once '/home/nstrand/config.php';
        
        try {
            //Establish database connection
            $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
            
            //Keep the connection open for reuse to improve performance
            $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
            
            //Throw an exception whenever a database error occurs
            $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            die( "Error!: " . $e->getMessage());
        } 
      }
      
      function addBlogPost($title, $entry, $username)
      {
        $insert = 'INSERT INTO Blog (user, entry, title, date) VALUES (:username, :entry, :title, :date)';
             
        $statement = $this->_pdo->prepare($insert);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->bindValue(':entry', $entry, PDO::PARAM_STR);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':date', date("m/d/y"), PDO::PARAM_STR);
        
        $statement->execute();
      }
      
      function welcomeNewBlogger($username){
        $welcomeTitle = "Welcome to the Blog Site!";
        $welcomeEntry = "To get started be sure to create your own blog post on the left nav bar!";
        $this->addBlogPost($welcomeTitle, $welcomeEntry, $username);
      }
      
      function getUsersProfileInfo($username)
      { 
        $select = 'SELECT id ,title, entry, date FROM `Blog` WHERE user = :username ORDER BY id DESC';
        $statement = $this->_pdo->prepare($select);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[$row['id']] = $row;
        }
        
        return $results;
      }
      
      function blogsPerUser()
      {
          $select = 'SELECT id, user, COUNT(*) AS `TotalBlogs` FROM `Blog` GROUP BY user';
        $statement = $this->_pdo->prepare($select);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[$row['id']] = $row;
             
        }
        
        return $results;
      }
      
      function blogCountForUser($arrayOfUsers, $usernameToSearch)
      {
        foreach ($this->blogsPerUser() as $y => $y_value) {
            if($usernameToSearch === $y_value['user']){
                $blogCount = $y_value['TotalBlogs'];
                
            }
        }
        
        return $blogCount;
      }
      
      function getBlog($username)
      {
        $select = 'SELECT id, title, entry FROM `Blog` Where user = :username';
        $statement = $this->_pdo->prepare($select);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        
        $results = array();
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[] = $row;
             
        }
        
        return $results;
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