<?php
    //Require the autoload file
    error_reporting('E_ALL');
    require_once('vendor/autoload.php');
    session_start();
    
    //Create an instance of the Base class
    $f3 = Base::instance();
    
    $f3->set('DEBUG', 3);
    
    //Default route
    $f3->route('GET|POST /', function($f3) {
            
       
        
        $control = new Controller();
        $control->renderHome($f3);
        
        
    });

    $f3->route('GET|POST /become-a-blogger', function($f3) {
        
      $control = new Controller();
      $control->renderBecomeABlogger($f3);
    
        
    });
    
    $f3->route('GET|POST /about-us', function($f3) {
        
      $control = new Controller();
      $control->renderAboutUs($f3);
        
    });
    
    $f3->route('GET|POST /login', function($f3) {
      
      $username = $_POST['username'];
      $pass = $_POST['password'];
      
      $control = new Controller();
      $control->renderLogin($f3, $username, $pass);
       
    });
    
    $f3->route('GET|POST /create-blog', function($f3) {
        
      $control = new Controller();
      $control->renderCreateBlog($f3);
        
    });
    
    $f3->route('GET|POST /your-blog', function($f3) {
        
      $control = new Controller();
      $control->renderYourBlogs($f3);
        
    });
    
    $f3->route('GET|POST /profile/@user', function($f3, $params) {
        
      $control = new Controller();
      $control->renderProfile($f3, $params);
        
    });
    
    $f3->route('GET|POST /profile/@user/@title', function($f3, $params) {
        
      $captureUserandTitle[] = array($params['user'] => $params['title']);
      $control = new Controller();
      $control->renderBlog($f3, $captureUserandTitle);
        
    });
    
    $f3->route('GET|POST /profile/createUser', function($f3) {
        
      $captureNewUser = $_POST;
      $control = new Controller();
      $control->createUser($f3, $captureNewUser);
        
    });
    
    $f3->route('GET|POST /logout', function($f3) {
        
      session_unset();
      session_destroy();
      session_start();
      $control = new Controller();
      $control->renderHome($f3);
        
    });
    
    //Run fat free
    $f3->run();
    