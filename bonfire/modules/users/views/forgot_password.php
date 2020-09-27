<main id="main">
	<section class="breadcrumbs">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
              	<h2>Reset Password</h2>
              	<ol>
                	<li><?php echo anchor(base_url(), 'Home'); ?></li>
                	<li>Reset Password</li>
              	</ol>
        	</div>
  		</div>
    </section>
	<section class="inner-page">
		<div class="container">
        	<div class="row">
        		<div class="col-md-6 offset-md-3">
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0"><?php echo lang('us_reset_password'); ?></h3>
                        </div>z
                        <div class="card-body">
                    			<?php if (validation_errors()) : ?>
                                	<div class="alert alert-danger">
                                		<?php echo validation_errors(); ?>
                                	</div>
                                <?php endif; ?>
                                
                                <div class="alert alert-danger">
                                	<?php echo lang('us_reset_note'); ?>
                                </div>
                                <?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required" for="display_name"><?php echo lang('bf_email'); ?></label>
                                    <div class="col-sm-9">
                                        <input class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" type="text" id="email" name="email" value="<?php echo set_value('email') ?>" />
                                        <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                                    </div>
                                </div>
                    			<input class="btn btn-primary" type="submit" name="send" value="<?php e(lang('us_send_password')); ?>" />
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
     </section>
</main>