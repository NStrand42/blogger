<?php
    /**
     * Provides CRUD access to pet names in our database
     *
     * PHP Version 5
     *
     * @author Josh Archer <jarcher@greenriver.edu>
     * @version 1.0
     */
    
    //CONNECT
    class blogDB
    {
        private $_pdo;
        
        function __construct()
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
        
         
        //CREATE
      function determineLoggedIn($user)
      {
        $select = 'SELECT password FROM Blogger WHERE username = :user';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindValue(':user', $user, PDO::PARAM_INT);
            $statement->execute();
             
             while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                
                $creds = $row['password'];
           }
            
            return $creds;
        
          return $this->_username;
      }
      
      function addBlogPost($title, $entry, $username){
        
      }
    }