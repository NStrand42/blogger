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
            $verifyPassword = $info['verifyPassword'];
            $image = $info['image'];
            $bio = $info['bio'];
            
            $f3->set('username', $username);
            $f3->set('email', $email);
            $f3->set('portrait', $image);
            $f3->set('bio', $bio);
            
            //if passwords don't match make them enter it again
            if($password != $verifyPassword){
                echo Template::instance()->render('view/pages/create-blogger.html');
                exit();
            }
            
            $user = new User();
            $blog = new Blog();
            $blog->welcomeNewBlogger($username);
            $added = $user->addUser($username, $email, $bio, $image, $password);
            
            
            if($added == false){
                $f3->set('userAlreadyExsists', "I'm sorry that user already exsists try a different username");
                echo Template::instance()->render('http://nstrand.greenrivertech.net/IT328/blogger/become-a-blogger');
                exit();
            }
            
            echo Template::instance()->render('view/pages/login.html');
        }
        
    }  
        
        
        