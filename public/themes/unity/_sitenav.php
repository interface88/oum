<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto">	<?php echo anchor(base_url(), '<img src="'.base_url('assets/images/logo.jpg').'"/>'); ?></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <nav class="nav-menu d-none d-lg-block">
        <ul>
        	<li><?php echo anchor(base_url('about'), 'About Us'); ?></li>
        	<li><?php echo anchor(base_url('campaign'), 'Campaigns'); ?></li>
        	<li><?php echo anchor(base_url('contact_us'), 'Contact Us'); ?></li>
          <?php
        if ($this->auth->is_logged_in() !== false)
              {
                echo '<li class="dropdown">
                        <a class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="'.base_url('users/profile').'">Profile</a></li>
                        <li><a class="dropdown-item" href="'.base_url('campaign/create').'">Start Campaign</a></li>';
               if($this->session->role_id==1)
                {
                  echo '<li><a class="dropdown-item" href="'.base_url('dashboard/index').'">Dashboard</a></li>';
                  echo '<li><a  class="dropdown-item" href="'.base_url('campaign/views').'">My Campaign</a></li>';
                  echo '<li><a  class="dropdown-item" href="'.base_url('category/lists').'">Category</a></li>';
                  echo '<li><a class="dropdown-item" href="'.base_url('subcategory/lists').'">Sub Category</a></li>';
                  echo '<li><a class="dropdown-item" href="'.base_url('contact_us/lists').'">Contact us</a></li>';
                  echo '<li><a class="dropdown-item" href="'.base_url('donation/lists').'">Donation</a></li>';
                  echo '<li><a class="dropdown-item" href="'.base_url('users/lists').'">User List</a></li>';
                }
                else{
                    echo '<li><a class="dropdown-item" href="'.base_url('campaign/view').'">My Campaign</a></li>';
                    echo '<li><a class="dropdown-item" href="'.base_url('donation/view').'">My Donation</a></li>';
                }
                 echo '<li><a class="dropdown-item" href="'.base_url('users/logout').'">Logout</a></li>
                        </ul>
                    </li>';
     /* $user_id = $this->session->userdata(); 
              print_r($user_id);
   */              
      }
          ?>
          <li class="book-a-table text-center"><a href="<?php echo base_url('campaign');?>">Donate</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->