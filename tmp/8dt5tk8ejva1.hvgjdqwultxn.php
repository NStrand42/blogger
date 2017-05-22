<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title>New Blogger</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         
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
                        <h1>Become a Blogger!</h1>
                        <h3>Create a new account below</h3>
                        </div>
                    </div>
                  </div>
                 </div>
                 
                <div class="row">
                  <div class="col-sm-12">
                    <div class="panel panel-default">
                      
                      
                        <div class="panel-heading">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="row">
                                <div class="col-sm-6 blogger-entry login-entry">
                                    
                                    <form class="form-signin">
                                        
                                        
                                        
                                        <div class="form-group">
                                          <label for="inputUsername" class="sr-only">Username</label>
                                          <input type="email" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                                          <label for="inputPassword" class="sr-only">Email</label>
                                          <input type="password" id="inputPassword" class="form-control" placeholder="Email" required>
                                        </div>
                                    
                                      <div class="form-group blogger-info">
                                        <label for="inputUsername" class="sr-only">Upload Portait Here</label>
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Password" required autofocus>
                                        
                                       
                                        <label for="inputPassword" class="sr-only">Password</label>
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Verify" required>
                                      </div>
                                      
          
                                
                                </div>
                              
                                
                              
                                <div class="col-sm-6 blogger-entry login-entry">
                                  
                                  
                                    <div class="form-group">
                                        <label for="inputUsername" class="sr-only">Username</label>
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Upload Portait Here" required autofocus>
                                    </div>
                                         <span class="input-group-addon">Quick Biogrpahy</span>
                                     
                                     <div class="form-group">   
                                        <label for="inputPassword" class="sr-only">Password</label>
                                        <textarea placeholder="" rows="6" class="form-control"></textarea>
                                     </div>
                                    
                                    
                                  
                                
                              </div>
                            </div>
                                
                            <div class="row">
                                 <div class="col-sm-6 col-sm-offset-3 login-entry">
                                    <button class="btn btn-lg btn-success btn-block login-button" type="submit">Log in</button>
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
          </div>
    </body>
</html>