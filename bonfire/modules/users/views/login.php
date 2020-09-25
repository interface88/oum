<!--<?php
  $site_open = $this->settings_lib->item('auth.allow_register');
?>
<p><br/><a href="<?php echo site_url(); ?>">&larr; <?php echo lang('us_back_to') . $this->settings_lib->item('site.title'); ?></a></p>-->


<main id="main">
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Login</h2>
          <ol>
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li>Login</li>
          </ol>
        </div>
      </div>
    </section>
</main>    
<div class="" style="background-image: url('<?php echo base_url('themes/unity/img/login.jpg');?>'); background-repeat: no-repeat; background-size:cover;">
  <div class="container-fluid">
    <div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-md-3">
      <h2><?php echo lang('us_login'); ?></h2>
        <?php echo Template::message(); ?>
        <?php if (validation_errors()) :?>
            <div class="row-fluid">
              <div class="span12">
                <div class="alert alert-error fade in">
                  <a data-dismiss="alert" class="close">&times;</a>
                  <?php echo validation_errors(); ?>
                </div>
              </div>
            </div>
        <?php endif; ?>
        <?php echo form_open(LOGIN_URL, array('autocomplete' => 'off','class'=>'form-horizontal')); ?>
          <div class="control-group <?php echo iif( form_error('login') , 'error') ;?>">
            <div class="form-group">
                 <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
              </div>
            </div>
          </div>
          <div class="control-group <?php echo iif( form_error('password') , 'error') ;?>">
             <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control"  name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
                </div>
             </div>
          </div>
          <?php if ($this->settings_lib->item('auth.allow_remember')) : ?>
            <div class="control-group">
              <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                     <div class="checkbox">
                          <label><input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
                          <span class="inline-help"><?php echo lang('us_remember_note'); ?></span></label>
                     </div>
                  </div>        
              </div>
            </div>
          <?php endif; ?>
          <div class="control-group">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-large btn-primary" type="submit" name="log-me-in" id="submit" value="<?php e(lang('us_let_me_in')); ?>" tabindex="5" />
              </div>
            </div>
          </div>
        <?php echo form_close(); ?>
                 <?php // show for Email Activation (1) only
                      if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
                    <!-- Activation Block -->
                        <p class="well">
                          <?php echo lang('bf_login_activate_title'); ?><br />
                          <?php
                          $activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]',anchor('/activate', lang('bf_activate')),lang('bf_login_activate_email'));
                          $activate_str = str_replace('[ACTIVATE_RESEND_URL]',anchor('/resend_activation', lang('bf_activate_resend')),$activate_str);
                          echo $activate_str; ?>
                        </p>
                    <?php endif; ?>
                    <div class="text-center">
                      <?php if ( $site_open ) : ?>
                        <?php echo anchor(REGISTER_URL, lang('us_sign_up')); ?>
                      <?php endif; ?> / <?php echo anchor('/forgot_password', lang('us_forgot_your_password')); ?>
                    </div>
    </div> 
    </div>
  </div>
</div>  