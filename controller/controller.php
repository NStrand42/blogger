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
          
          echo Template::instance()->render('view/pages/about-us.html');
        }
        
        function renderLogin($f3)
        {
          
          echo Template::instance()->render('view/pages/login.html');
        }
        
        function renderCreateBlog($f3)
        {
          
          echo Template::instance()->render('view/pages/create-blog.html');
        }
        
        function renderBecomeABlogger($f3)
        {
          
          echo Template::instance()->render('view/pages/create-blogger.html');
        }
        
        function renderYourBlogs($f3)
        {
          
          echo Template::instance()->render('view/pages/your-blogs.html');
        }
        
        function renderProfile($f3)
        {
          
          $f3->set('user', "Joe Schmoe");
          $f3->set('topBlog', array('RecentTitle' => 'Recent Entry'));
          $f3->set('blogs', array('Title' => 'Entry',
                                    'Title2' => 'Entry',
                                    'Title3' => 'Entry'));
          $f3->set('bio', "Joe Schmoes Bio is right here");
          
 
          
          echo Template::instance()->render('view/pages/profile.html');
        }
        
    }  
        
        
        