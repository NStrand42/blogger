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
        <img id="trumpet"src="images/trumpet.png" alt="trumpet" style="width:10vw;">
        <li><a href="/">Home ></a></li>
    
        <?php if ($user): ?>
            <!-- logged in now show these --> 
          
            <li><a href="scholarships-admin.php">MyBlogs ></a></li>
            <li><a href="opp-admin.php">Create Blog ></a></li>
            <li><a href="admin_logout.php">About Us ></a></li>
            <li><a href="admin_logout.php">Logout ></a></li>
          
          
          <!-- if not logged in show these--> 
          <?php else: ?>
            <li><a href="scholarships-admin.php">Become A Blogger ></a></li>
            <li><a href="opp-admin.php">About Us ></a></li>
            <li><a href="admin_logout.php">Login ></a></li>
          
         <?php endif; ?>
        </ul>
      </li>
    </ul>
    
  </div><!-- /.navbar-collapse -->
</nav>