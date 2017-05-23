<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Profile Info</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         
        <!-- bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         
         <!-- personal style sheet -->
         <link rel="stylesheet" type="text/css" href="../styles/main-style.css">
         
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="">
    </head>
     
    <body>
        <div class="container-fluid">
            <div class="row content">
              <div class="col-sm-2 sidenav">
                
                <?php echo $this->render('view/includes/sidebar.inc.html',NULL,get_defined_vars(),0); ?>
                
              </div>
          
              <div class="col-sm-10">
                
                <div class="row">
                   <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h1><?= $user ?> Blogs</h1>
                        </div>
                    </div>
                   </div>
                </div>
                 
                <div class="row"> 
                <div class="col-sm-8">
                  <div class="row">
                  
                  
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                          <?php foreach (($topBlog?:[]) as $topBlog): ?>
                            <a href="./blog/<?= $topBlog[title] ?>"> <?= $topBlog[title] ?></a>
                            <pre><?= $topBlog[entry] ?></pre>
                          <?php endforeach; ?>
                          </div>
                      </div>
                    </div>
                  

                    <div class="col-sm-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                            <h2>My blogs:</h2>
                            <hr>
                            <?php foreach (($blogs?:[]) as $blog): ?>
                              <a href="./blog/<?= $blog[title] ?>"> <?= $blog[title] ?> - word count <?= $blog[wordCount] ?> - <?= $blog[date] ?></a>
                              <pre><?= $blog[entry] ?></pre>
                              <hr>
                            <?php endforeach; ?>
                          </div>
                      </div>
                    </div>
                 
                 
                </div>
                 
                
                </div>
                
                <div class="col-sm-4">
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                          <div class="panel-content">
                            <img id="irc_mi" class="" src="http://pets.vethospitals.ufl.edu/files/2012/04/Ocala_main.jpg" alt="" width="100%">
                          </div>
                      </div>
                    </div>
                    
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <pre id="bio">Bio: <?= $bio ?></pre>
                        </div>
                      </div>
                    </div>
                  </div>
                    
                    
                 </div>
                </div>
              </div>
            </div>
          </div>
    </body>
</html>