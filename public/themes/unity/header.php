<!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
     <div class="contact-info mr-auto">
      <!--   <i class="icofont-phone"></i> +1 5589 55488 55
        <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Mon-Sat: 11:00 AM - 23:00 PM</span>
      -->
      </div>
      <div class="languages">
        <ul>
        <?php
          if ($this->auth->is_logged_in() !== false)
            {
                echo '<li><a> Hi,'.$this->auth->user()->display_name.'</a></li>';
            }
        else{
                  echo '<li><a href="'.base_url('login').'">Login</a></li>';
                  echo '<li><a href="'.base_url('register').'">Register</a></li>';
            }
          ?>
         </ul>
      </div>
    </div>
  </div>

  