<?php
$errorClass   = empty($errorClass) ? ' error' : $errorClass;
$controlClass = empty($controlClass) ? 'span6' : $controlClass;
$fieldData = array(
    'errorClass'    => $errorClass,
    'controlClass'  => $controlClass,
);
?>
<main id="main">
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Register</h2>
          <ol>
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li>Register</li>
          </ol>
        </div>
      </div>
    </section>
</main>    
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-md-2">
                <h1 class="page-header"><?php echo lang('us_sign_up'); ?></h1>
                    <?php if (validation_errors()) : ?>
                    <div class="alert alert-error fade in"><?php echo validation_errors(); ?></div>
                    <?php endif; ?>
                    <div class="alert alert-info fade in">
                        <h4 class="alert-heading"><?php echo lang('bf_required_note'); ?></h4>
                        <?php if (isset($password_hints)) {echo $password_hints;}?>
                    </div>
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