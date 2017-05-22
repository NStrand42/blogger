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
        
        function renderProfile($f3, $params)
        {
          
          $testArray1 = array('title' => 'This is the Top Blogs Title',
                              'entry' => 'Entry',
                              'wordCount' => '1',
                              'date' => "05/22/2017");
          
          $testArray1[entry] = "" . "This is a long Entry. This is a long Entry.This is a long Entry. This is a long Entry. This is a long Entry.This is a long Entry.

This is a long Entry. This is a long Entry.This is a long Entry.This is a long Entry. This is a long Entry.This is a long Entry.

This is a long Entry. This is a long Entry.This is a long Entry.This is a long Entry. This is a long Entry.This is a long Entry.

This is a long Entry. This is a long Entry.This is a long Entry.This is a long Entry. This is a long Entry.This is a long Entry.
";
          
 
          $testArray2 = array('title' => 'Title2',
                              'entry' => $testArray1[entry],
                              'wordCount' => '2',
                              'date' => "05/22/2017");
          
          $testArray3 = array('title' => 'Title3',
                              'entry' => $testArray1[entry],
                              'wordCount' => '3',
                              'date' => "05/22/2017");
          
          $firstBlog[] = $testArray1;
          
          $testArray = array($testArray1, $testArray2, $testArray3);
          
          $f3->set('topBlog', $firstBlog);
          $f3->set('user', $params['user']);
          $f3->set('blogs',  $testArray);
          
          
          $f3->set('bio', $testArray1[entry]);
          
 
          
          echo Template::instance()->render('view/pages/profile.html');
        }
        
    }  
        
        
        