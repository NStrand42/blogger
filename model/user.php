<?php
    class User
    {
      private $_username;
      private $_email;
      private $_bio;
      private $_portrait;
      private $_blogs;
      
      private $_pdo;
      
      function __construct($username="unknown", $email="unknown", $bio="unknown",
                           $portrait="unknown")
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
      
      function addUser($username="unknown", $email="unknown", $bio="Not Entered",
                       $portrait="http://pets.vethospitals.ufl.edu/files/2012/04/Ocala_main.jpg", $password="unknown")
      {
             

        
        
        
           $select = 'SELECT userName FROM `Blogger` WHERE userName = :username';
           $statement = $this->_pdo->prepare($select);
           $statement->bindValue(':username', $username, PDO::PARAM_STR);
           $statement->execute();
           
           
           while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                if($row['userName'] == $username){
                return false;
                }
           }
        
        
        $hash = sha1($password);
          $insert = 'INSERT INTO Blogger (userName, email, portrait, bio, password) VALUES (:username, :email, :portrait, :bio, :password)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->bindValue(':bio', $bio, PDO::PARAM_STR);
            $statement->bindValue(':portrait', $portrait, PDO::PARAM_STR);
            $statement->bindValue(':password', $hash, PDO::PARAM_STR);
            
            $statement->execute();
            
            return true;
            
      }
      
      function getAllUsers()
      {
        $select = 'SELECT id, username ,portrait FROM `Blogger`';
        $statement = $this->_pdo->prepare($select);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);
        $statement->execute();
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
             
             $results[$row['id']] = $row;
        }
        
        return $results;
      }
      
      function getBio($username)
      {
         $select = 'SELECT bio FROM `Blogger` WHERE userName = :username';
           $statement = $this->_pdo->prepare($select);
           $statement->bindValue(':username', $username, PDO::PARAM_STR);
           $statement->execute();
           
           
           while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                return $row[bio];
           }
      }
      
      
      function getPortrait($username)
      {
          $select = 'SELECT portrait FROM `Blogger` WHERE userName = :username';
           $statement = $this->_pdo->prepare($select);
           $statement->bindValue(':username', $username, PDO::PARAM_STR);
           $statement->execute();
           
           
           while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                return $row[portrait];
           }
      }
      
      function getAllBlogs()
      {
          return $this->_blogs;
      }
      
      function addBlog($title, $entry)
      {
        $this->_blogs[] = new Blog($title, $entry);
      }
      
    }