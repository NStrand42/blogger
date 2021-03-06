<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>Create Blog</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles/main-style.css">
         
        <!-- bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
         
         <!-- personal style sheet -->
         <link rel="stylesheet" type="text/css" href="styles/main-style.css">
         
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
                        <h1>What's on your mind?</h1>
                        </div>
                    </div>
                  </div>
                 </div>
                 
                 
                 
                 
                 <div class="row">
                  
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <form action="http://nstrand.greenrivertech.net/IT328/blogger/profile/<?= $usernameCheck ?>" method="post" class="form-horizontal">
                              <div class="row">
                                
                                
                                
                                  <div class="col-sm-10">
                                    <div class="panel">
                                    <input input type="text"  class="form-control" name="title" placeholder="Title of Blog" required autofocus>
                                   </div>
                                  </div>
                                  
                                  <div class="col-sm-2">
                                    <div class="panel panel-default">
                                    <span class="input-group-addon">Title</span>
                                    </div>
                                  </div>
                                
                                
                            
                            
                            </div>
                          
                           
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="panel panel-default">
                              <span class="input-group-addon">Blog Entry</span>
                             </div>
                            </div>
                          </div>
                           
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="panel panel-default">
                                
                                <label for="inputPassword" class="sr-only">Password</label>
                                <textarea  input type="text"  rows="10" class="form-control" name="entry" placeholder="Begin your Entry here" required "></textarea>
                              
                             </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-sm-6 col-sm-offset-3 login-entry">
                               <button class="btn btn-lg btn-success btn-block login-button" type="submit">Save</button>
                            </div>
                                        
                            </form> 
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