<?php
    class Controller
    {
        
        function __construct()
        {
          
        }
        
        
        function renderHome($f3)
        {
          
          echo Template::instance()->render('view/pages/about-us.html');
        }
        
        function renderAboutUs($f3)
        {
          
          echo Template::instance()->render('view/about-us.html');
        }
        
        function renderLogin($f3)
        {
          
          echo Template::instance()->render('view/login.html');
        }
        
        function renderCreateBlog($f3)
        {
          
          echo Template::instance()->render('view/create-blog.html');
        }
        
        function renderBecomeABlogger($f3)
        {
          
          echo Template::instance()->render('view/create-blogger.html');
        }
        
        
    }  
        
        
        