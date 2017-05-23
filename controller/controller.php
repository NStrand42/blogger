<?php
    class Controller
    {
        
        function __construct()
        {
          
        }
        
        
        function renderHome($f3)
        {
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
          
          //Get an array that has all blogs associated to user title, entry, date
          
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
        
        function renderBlog($f3, $params)
        {
            
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
        
    }  
        
        
        