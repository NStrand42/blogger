<!-- Sidebar -->
<div id="sidebar-wrapper">
  <ul class="sidebar-nav nav-pills nav-stacked">
    
    <h1>Blog Site</h1>
    
    <img src="" alt="Trumpet">
    
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
</div>