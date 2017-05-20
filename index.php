<?php
    //Require the autoload file
    error_reporting('E_ALL');
    require_once('vendor/autoload.php');
    session_start();
    
    //Create an instance of the Base class
    $f3 = Base::instance();
    
    //Default route
    $f3->route('GET|POST /', function($f3) {
            
        $control = new Controller();
        $control->renderHome($f3, $_SESSION);
        
    });

    $f3->route('GET|POST /become-a-blogger', function($f3) {
        
      $control = new Controller();
      $control->renderBecomeABlogger($f3, $_SESSION);
    
        
    });
    
    $f3->route('GET|POST /about-us', function($f3) {
        
      $control = new Controller();
      $control->renderAboutUs($f3, $_SESSION);
        
    });
    
    $f3->route('GET|POST /login', function($f3) {
        
      $control = new Controller();
      $control->renderLogin($f3, $_SESSION);
       
    });
    
    $f3->route('GET|POST /create-blog', function($f3) {
        
      $control = new Controller();
      $control->renderCreateBlog($f3, $_SESSION);
        
    });
    
    //Run fat free
    $f3->run();
    