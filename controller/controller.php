<?php
    class Controller
    {
        
        function __construct()
        {
          
        }
        
        
        function renderHome($f3, $_SESSION)
        {
          
          echo Template::instance()->render('view/home.html');
        }
        
        function renderAboutUs($f3, $_SESSION)
        {
          
          echo Template::instance()->render('view/about-us.html');
        }
        
        function renderLogin($f3, $_SESSION)
        {
          
          echo Template::instance()->render('view/login.html');
        }
        
        function renderCreateBlog($f3, $_SESSION)
        {
          
          echo Template::instance()->render('view/create-blog.html');
        }
        
        function renderBecomeABlogger($f3, $_SESSION)
        {
          
          echo Template::instance()->render('view/create-blogger.html');
        }
        
        
        
        
        
        