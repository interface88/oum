<?php

$errorClass   = empty($errorClass) ? 'is-invalid' : $errorClass;
$controlClass = empty($controlClass) ? 'form-control' : $controlClass;
$fieldData = array(
    'errorClass'    => $errorClass,
    'controlClass'  => $controlClass,
);
?>
<style scoped='scoped'>
#register p.already-registered {
    text-align: center;
}git
</style>

<main id="main">
	<section class="breadcrumbs">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
              	<h2>Register as new user</h2>
              	<ol>
                	<li><?php echo anchor(base_url(), 'Home'); ?></li>
                	<li>Register</li>
              	</ol>
        	</div>
  		</div>
    </section>
	<section class="inner-page">
		<div class="container">
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3 class="mb-0">Login</h3>
                </div>
                <div class="card-body">
                <h1 class="page-header"><?php echo lang('us_sign_up'); ?></h1>
                <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert"	>
                    <?php echo validation_errors(); ?>
                </div>
                <?php endif; ?>
                <div class="alert alert-primary" role="alert">
                    <h5 class="alert-heading"><?php echo lang('bf_required_note'); ?></h5>
                    <?php
                    if (isset($password_hints)) {
                        echo $password_hints;
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo form_open(site_url(REGISTER_URL), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>
                            <fieldset>
                                <?php Template::block('user_fields', 'user_fields', $fieldData); ?>
                            </fieldset>
                            <fieldset>
                                <?php
                                // Allow modules to render custom fields. No payload is passed
                                // since the user has not been created, yet.
                                Events::trigger('render_user_form');
                                ?>
                                <!-- Start of User Meta -->
                                <?php $this->load->view('users/user_meta', array('frontend_only' => true)); ?>
                                <!-- End of User Meta -->
                            </fieldset>
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="btn btn-primary" type="submit" name="register" id="submit" value="<?php echo lang('us_register'); ?>" />
                                    </div>
                                </div>
                            </fieldset>
                        <?php echo form_close(); ?>
                        <p class='already-registered'>
                            <?php echo lang('us_already_registered'); ?>
                            <?php echo anchor(LOGIN_URL, lang('bf_action_login')); ?>
                        </p>
                    </div>
                </div>
                </div>
            </div>
         </div>	
    </section>
 </main>
