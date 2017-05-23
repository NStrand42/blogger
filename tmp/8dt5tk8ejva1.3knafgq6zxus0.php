<nav class="navbar navbar-default navbar-fixed-left" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./"><h2>Blog Site</h2></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
        <img id="trumpet"src="http://nstrand.greenrivertech.net/IT328/blogger/images/trumpet.png" alt="../images/trumpet.png" style="width:10vw;">
        <li><a href="http://nstrand.greenrivertech.net/IT328/blogger">Home ></a></li>
    
        <?php if ($user): ?>
            <!-- logged in now show these --> 
          
            <li><a href="http://nstrand.greenrivertech.net/IT328/blogger/your-blog">MyBlogs ></a></li>
            <li><a href="http://nstrand.greenrivertech.net/IT328/blogger/create-blog">Create Blog ></a></li>
            <li><a href="http://nstrand.greenrivertech.net/IT328/blogger/about-us">About Us ></a></li>
            <li><a href="http://nstrand.greenrivertech.net/IT328/blogger/admin_logout.php">Logout ></a></li>
          
          
          <!-- if not logged in show these--> 
          <?php else: ?>
            <li><a href="http://nstrand.greenrivertech.net/IT328/blogger/become-a-blogger">Become A Blogger ></a></li>
            <li><a href="http://nstrand.greenrivertech.net/IT328/blogger/about-us">About Us ></a></li>
            <li><a href="http://nstrand.greenrivertech.net/IT328/blogger/login">Login ></a></li>
          
         <?php endif; ?>
        </ul>
      </li>
    </ul>
    
  </div><!-- /.navbar-collapse -->
</nav>