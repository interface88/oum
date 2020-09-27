<style>
  .dropdown-menu{background-color: #000000;}
</style>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto">	<?php echo anchor(base_url(), 'OUM'); ?></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
        	<li><?php echo anchor(base_url('home/about'), 'About Us'); ?></li>
        	<li><?php echo anchor(base_url('home/campaign'), 'Campaigns'); ?></li>
        	<li><?php echo anchor(base_url('home/contactus'), 'Contact Us'); ?></li>
          <?php
        if ($this->auth->is_logged_in() !== false)
              {
                echo '<li class="dropdown book-a-table text-center">
                        <a type="button" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                        <ul class="dropdown-menu">
                        <li><a href="'.base_url('users/profile').'">Profile</a></li>
                        <li><a href="'.base_url('campaign/Create').'">Start Campaign</a></li>';
               if($this->session->role_id==1)
                {
                  echo '<li><a href="'.base_url('campaign/Views').'">My Campaign</a></li>';
                  echo '<li><a href="'.base_url('campaign/category_view').'">Category</a></li>';
                  echo '<li><a href="'.base_url('campaign/sub_category_view').'">Sub Category</a></li>';
                }
                else{
                    echo '<li><a href="'.base_url('campaign/View').'">My Campaign</a></li>';
                }
                 echo '<li><a href="'.base_url('users/logout').'">Logout</a></li>
                        </ul>
                    </li>';
     /* $user_id = $this->session->userdata(); 
              print_r($user_id);
   */              
      }
          ?>
          <li class="book-a-table text-center"><a href="#book-a-table">Donate</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->