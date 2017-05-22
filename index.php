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
        
      $control = new Controller();
      $control->renderLogin($f3);
       
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
      $control->renderprofile($f3, $params);
        
    });
    
    //Run fat free
    $f3->run();
    