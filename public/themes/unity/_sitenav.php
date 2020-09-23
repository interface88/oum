<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">OUM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
          <?php
     if ($this->auth->is_logged_in() !== false)
      {
              echo '<li><a href="'.base_url('users/logout').'">Logout</a></li>';
              echo '<li><a href="'.base_url('campaign/front_view_user').'">View Campaign</a></li>';
              echo '<li class="book-a-table text-center"><a href="'.base_url('campaign/new').'">Start Campaign</a></li>';
      }
  else{
            echo '<li><a href="'.base_url('login').'">Login</a></li>';
            echo '<li><a href="'.base_url('register').'">Create Account</a></li>';
      }
          ?>
          <li class="book-a-table text-center"><a href="#book-a-table">Donate</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->