<?php
    class Controller
    {
        private $sess;
        
        function __construct()
        {
           $sess = new blogDB;
        }
        
        function checkLoggedIn($f3) {
            
            if(isset($_SESSION['username']))
            {
                $f3->set('usernameCheck', $_SESSION['username']);
            }
        }
        
        function addPost($title, $entry, $username){
            $sess = new Blog();
            $sess->addBlogPost($title, $entry, $username);
        }
        
        function renderHome($f3)
        {
            $this->checkLoggedIn($f3);
            
            $users = new User;
            $allUsers = $users->getAllUsers();
            
            $blogs = new Blog;
            $blogsGroupedByUsers = $blogs->blogsPerUser();
            
             foreach ($allUsers as $x => $x_value) {
             
             //need to get the users top blogs entry
             $results = $blogs->getUsersProfileInfo($x_value['username']);
             $topBlog = current($results);
              
              
            $blogCount = $blogs->blogCountForUser($blogsGroupedByUsers, $x_value['username']);

            $username = $x_value['username'];
            $entry = $topBlog['entry'];
            $portrait = $x_value['portrait'];
                 
            $resultsArray[] = array('username' => $username,
                              'portrait' => $portrait,
                              'blogTotal' => $blogCount,
                              'topEntry' => $entry); 
            }
            
            
          
          $f3->set('users',  $resultsArray);
          
          echo Template::instance()->render('view/pages/home.html');
        }
        
        function renderAboutUs($f3)
        {
          $this->checkLoggedIn($f3);
          echo Template::instance()->render('view/pages/about-us.html');
        }
        
        function renderLogin($f3, $username, $pass)
        {
          $this->checkLoggedIn($f3);
          $credentials = new blogDB;
          $loginCheck = $credentials->determineLoggedIn($username);
          
          
          if(sha1($pass) == $loginCheck) {
            $_SESSION['username'] = $username;
            $f3->reroute('/');
          }
          
          //Otherwise prompt with login and then needs to match
          
          echo Template::instance()->render('view/pages/login.html');
        }
        
        function renderCreateBlog($f3)
        {
          $this->checkLoggedIn($f3);
          echo Template::instance()->render('view/pages/create-blog.html');
        }
        
        function renderBecomeABlogger($f3)
        {
          $this->checkLoggedIn($f3);
          echo Template::instance()->render('view/pages/create-blogger.html');
        }
        
        function renderYourBlogs($f3)
        {
          $this->checkLoggedIn($f3);
          echo Template::instance()->render('view/pages/your-blogs.html');
        }
        
        function renderProfile($f3, $params)
        {
          $this->checkLoggedIn($f3);
          
          $sess = new Blog;
          
          //Get an array that has all blogs associated to user title, entry, date
          $results = $sess->getUsersProfileInfo($params['user']);
          
          
          $topBlog = current($results);
          next($results);
          
          foreach ($results as $x => $x_value) {
              
            $title = $x_value['title'];
            $entry = $x_value['entry'];
            $wordCount = count_chars($x['entry']);
            $date = $x_value['date'];
            
              $resultsArray[] = array('title' => $title,
                              'entry' => $entry,
                              'wordCount' => $wordCount,
                              'date' => $date); 
            }
           
          
          $f3->set('topBlog', $topBlog);
          $f3->set('user', $params['user']);
          $f3->set('blogs',  $resultsArray);
          
          $user = new User();
          $f3->set('bio', $user->getBio($params['user']));
          $f3->set('portrait', $user->getPortrait($params['user']));
          
          
          echo Template::instance()->render('view/pages/profile.html');
        }
        
        function renderBlog($f3, $params)
        {
            $this->checkLoggedIn($f3);
            
            //Get the array from the database that has has Blogs and entries associated to user title, entry
            $sess = new Blog;
            $blog = $sess->getBlog($params['user']);
            
             foreach ($blog as $key => $value) {

                    $f3->set('title', $value['title']);
                    $f3->set('entry', $value['entry']);
                
            }
            
            $sess = new User;
            $f3->set('portrait', $sess->getPortrait($params['user']));
            
            
            
            
            echo Template::instance()->render('view/pages/blog.html');
        }
        
        function createUser($f3, $info)
        {
            $this->checkLoggedIn($f3);
            //Get the form data
            
            $username = $info['username'];
            $email = $info['email'];
            $password = $info['password'];
            $bio = $info['bio'];
            $image = $info['image'];
            
            //ensure the email is valid
            
            if (!(filter_var($info['email'], FILTER_VALIDATE_EMAIL))) {
                $errors['emailError'] = "Email address not valid. Please try again";
            }
            
            //check that the passwords match
            
            $verifyPassword = $info['verifyPassword'];
            
            if ( $info['password'] != $info['verifyPassword']) {
                $errors['passworderror'] = "These passwords do not match please try again";
            }
            
            //check the password contains what it should special chr, number, at least 6 characters and a letter
        
            if (strlen($info['password']) < 6) {
                $errors['passwordCharacterError'] = array("charLength" => "Password too short!") ;
            }
            
            
             // /[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/
            if ((!preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $info['password']))) {
                $errors['passwordCharacterError'] += array("charSpecialCharacter" => "Password must include at least one special character");
            }
        
            if (!preg_match("#[0-9]+#", $info['password'])) {
                $errors['passwordCharacterError'] += array("charNumber" => "Password must include at least one number");
            }
        
            if (!preg_match("#[a-zA-Z]+#", $info['password'])) {
                $errors['passwordCharacterError'] += array("charLength" => "Password must include at least one letter") ;
            }     
          
            //strip any html from bio
            
            if($bio != strip_tags($info['bio'])){
                $errors['bioHTMLInjection'] = "Use of HTML tags not available in Bio";
            }
            
            //if no errors then attempt to add the user. If returns false username taken and render create blogger again
            
            $f3->set('username', $username);
            $f3->set('email', $email);
            $f3->set('portrait', $image);
            $f3->set('bio', $bio);
            
            $user = new User();
            $added = $user->addUser($username, $email, $bio, $image, $password);
            
            
            if($added == false){
                 $errors['usernameError'] = "I'm sorry that username already exsists. Please try a different username";
            }
            
            // check to see if $errors was created if so render create blogger again and send output to user
            
            if (isset($errors)){
                if (isset($errors['usernameError'])){
                    $f3->set('usernameError', $errors['usernameError']);
                }
                
                if (isset($errors['passworderror'])){
                     $f3->set('passwordError', $errors['passworderror']);
                }
                
                if (isset($errors['passwordCharacterError'])){
                    $f3->set('passwordCharacterError', $errors['passwordCharacterError']);
                }
                
                if (isset($errors['bioHTMLInjection'])){
                    $f3->set('bioHTMLInjection', $errors['bioHTMLInjection']);
                }
                
                if (isset($errors['emailError'])){
                    $f3->set('emailError', $errors['emailError']);
                }
                
                echo Template::instance()->render('view/pages/create-blogger.html');
                exit();
            }
            
            $blog = new Blog();
            $blog->welcomeNewBlogger($username);
            
            echo Template::instance()->render('view/pages/login.html');
        }
        
    }  
        
        
        