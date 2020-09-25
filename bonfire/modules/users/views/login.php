<!--<?php
	$site_open = $this->settings_lib->item('auth.allow_register');
?>
<p><br/><a href="<?php echo site_url(); ?>">&larr; <?php echo lang('us_back_to') . $this->settings_lib->item('site.title'); ?></a></p>-->

<main id="main">
	<section class="breadcrumbs">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
              	<h2>Sign In</h2>
              	<ol>
                	<li><?php echo anchor(base_url(), 'Home'); ?></li>
                	<li>Sign In</li>
              	</ol>
        	</div>
  		</div>
    </section>
	<section class="inner-page">
		<div class="container">
        	<?php echo Template::message(); ?>
        	<?php if (validation_errors()) :	?>
            	<div class="row">
            		<div class="col-md-6">
            			<div class="alert alert-danger">
            			  <a data-dismiss="alert" class="close">&times;</a>
            				<?php echo validation_errors(); ?>
            			</div>
            		</div>
            	</div>
        	<?php endif; ?>
			 <div class="row">
                <div class="col-md-6 offset-md-3">
					 <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0"><?php echo lang('us_login'); ?></h3>
                        </div>
                        <div class="card-body">
             
                        	<?php echo form_open(LOGIN_URL, array('autocomplete' => 'off')); ?>
                
                        		<div class="form-group <?php echo iif( form_error('login') , 'error') ;?>">
                        			<label for="login_value">Login Id</label>
                        			<input  class="form-control" type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>" tabindex="1" placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') .'/'. lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>" />
                        		</div>
                        
                        		<div class="form-group <?php echo iif( form_error('password') , 'error') ;?>">
                        			<label for="password">Password</label>
                        			<input class="form-control" type="password" name="password" id="password" value="" tabindex="2" placeholder="<?php echo lang('bf_password'); ?>" />
                        		</div>
                        
                        		<?php if ($this->settings_lib->item('auth.allow_remember')) : ?>
                        			<div class="form-group">
                        				<label class="checkbox" for="remember_me">
                        					<input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3" />
                        					<span class="inline-help"><?php echo lang('us_remember_note'); ?></span>
                        				</label>
                        			</div>
                        		<?php endif; ?>
                        		<input class="btn btn-large btn-primary" type="submit" name="log-me-in" id="submit" value="<?php e(lang('us_let_me_in')); ?>" tabindex="5" />
                        	<?php echo form_close(); ?>
                        
                        	<?php // show for Email Activation (1) only
                        		if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
                        	<!-- Activation Block -->
                        			<p style="text-align: left" class="well">
                        				<?php echo lang('bf_login_activate_title'); ?><br />
                        				<?php
                        				$activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]',anchor('/activate', lang('bf_activate')),lang('bf_login_activate_email'));
                        				$activate_str = str_replace('[ACTIVATE_RESEND_URL]',anchor('/resend_activation', lang('bf_activate_resend')),$activate_str);
                        				echo $activate_str; ?>
                        			</p>
                        	<?php endif; ?>
                        
                        	<p style="text-align: center">
                        		<?php if ( $site_open ) : ?>
                        			<?php echo anchor(REGISTER_URL, lang('us_sign_up'), 'class="alert-link"'); ?>
                        		<?php endif; ?>
                        
                        		<br/><?php echo anchor('/forgot_password', lang('us_forgot_your_password'), 'class="alert-link"' ); ?>
                        	</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
	</section>
</main>