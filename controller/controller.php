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
            $testArray1 = array('name' => 'This is the Top Blogs Title',
                              'topEntry' => 'Entry',
                              'blogTotal' => '1');
            
          $testArray1[entry] = "" . "This is a long Entry. This is a long Entry.This is a long Entry. This is a long Entry. This is a long Entry.This is a long Entry.

This is a long Entry. This is a long Entry.This is a long Entry.This is a long Entry. This is a long Entry.This is a long Entry.

This is a long Entry. This is a long Entry.This is a long Entry.This is a long Entry. This is a long Entry.This is a long Entry.

This is a long Entry. This is a long Entry.This is a long Entry.This is a long Entry. This is a long Entry.This is a long Entry.
";
          
 
          $testArray2 = array('name' => 'Some guy',
                              'topEntry' => $testArray1[entry],
                              'blogTotal' => '2');
          
          $testArray3 = array('name' => 'Thomas Hank',
                              'topEntry' => $testArray1[entry],
                              'blogTotal' => '3');
          
          $testArray4 = array('name' => 'Some guy',
                              'topEntry' => $testArray1[entry],
                              'blogTotal' => '2');
          
          $testArray5 = array('name' => 'Thomas Hank',
                              'topEntry' => $testArray1[entry],
                              'blogTotal' => '3');
          
          $testArray6 = array('name' => 'Some guy',
                              'topEntry' => $testArray1[entry],
                              'blogTotal' => '2');
          
          $testArray7 = array('name' => 'Thomas Hank',
                              'topEntry' => $testArray1[entry],
                              'blogTotal' => '3');
          
          $testArray = array($testArray1, $testArray2, $testArray3, $testArray4, $testArray5,$testArray6,$testArray7);
          
          $f3->set('users',  $testArray);
          
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
          
          
          echo Template::instance()->render('view/pages/profile.html');
        }
        
        function renderBlog($f3, $params)
        {
            $this->checkLoggedIn($f3);
            //Get the array from the database that has has Blogs and entries associated to user title, entry
            foreach ($params as $x => $x_value) {
              
              $title = $x_value;
            
              $f3->set('title', $x_value);
              $f3->set('user', $x);
            }
            
            
            
            //These test arrays assume database pull only pulled where user meets $params['user']
            $testArray2 = array('title' => 'Title2',
                                
                              'entry' => "This is just an entry",
                              'wordCount' => '2',
                              'date' => "05/22/2017");
          
          $testArray3 = array('title' => 'Title3',
                              'entry' => "This is just an entry",
                              'wordCount' => '3',
                              'date' => "05/22/2017");
          
          $arr[] = array($testArray2, $testArray3);
            
            
            //Assign variables to use in template
            foreach ($arr as $key => $value) {
                
                echo $key;
                echo $value;
                
                if($key[title] === $title) {
                    $f3->set('title', $value[title]);
                    $f3->set('entry', $value[entry]);
                }
            }
            
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
            $added = $user->addUser($username, $email, $bio, $image, $password);
            
            if($added == false){
                $f3->set('userAlreadyExsists', "I'm sorry that user already exsists try a different username");
                echo Template::instance()->render('http://nstrand.greenrivertech.net/IT328/blogger/become-a-blogger');
                exit();
            }
            
            echo Template::instance()->render('http://nstrand.greenrivertech.net/IT328/blogger/login');
        }
        
    }  
        
        
        