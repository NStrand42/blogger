<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>About Us</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
         
        <!-- bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h1>The Blog Site</h1>
                        <h3>Your one-stop shop for internet blogs</h3>
                        </div>
                    </div>
                 </div>
                 
                 <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3>The Internet is abuzz with our blog content.</h3>
                        <hr>
                        <p>
                            Lorem ipsum dolor sit amet, conectetur adipiscing elit. Nun ut porta dui. Name maximus et maruris eu tempor.
                            Nulla rhoncus lorem phareta molestie bladit. Sed pellentesque lacus quis aiquam maximus. Integer sodales egets
                            purus vitae condimentm. Phasellus neque neque. rutrum ut mattis ut, tincidunt eget ante. Vivamus faucibus argue
                            in euismof ultrices.
                        </p>
                        <hr>
                        
                        <h3>Hear what others are saying about us!</h3>
                        <br />
                        <p>
                            "Lorem ipsum dolor sit amet, conectetur adipiscing elit. Nun ut porta dui. Name maximus et maruris eu tempor."
                            -long time user Sally Bguyn
                        </p>
                        <br />
                        <p>
                            "Lorem ipsum dolor sit amet, conectetur..." blog contributor Terry Stone
                        </p>
                        </div>
                    </div>
                 </div>
                 
                
              </div>
            </div>
          </div>
    </body>
</html>