<?php /* /users/views/user_fields.php */
$currentMethod = $this->router->fetch_method();
$errorClass     = empty($errorClass) ? 'is-invalid' : $errorClass;
$controlClass   = empty($controlClass) ? 'form-control' : $controlClass;
$registerClass  = $currentMethod == 'register' ? ' required' : '';
$editSettings   = $currentMethod == 'edit';

$defaultLanguage = isset($user->language) ? $user->language : strtolower(settings_item('language'));
$defaultTimezone = isset($user->timezone) ? $user->timezone : strtoupper(settings_item('site.default_user_timezone'));

?>
<div class="form-group row">
    <label class="col-sm-3 col-form-label" for="email"><?php echo lang('bf_email'); ?></label>
    <div class="col-sm-9">
        <input class="<?php echo $controlClass; ?> <?php echo form_error('email') ? $errorClass : ''; ?>" type="text" id="email" name="email" value="<?php echo set_value('email', isset($user) ? $user->email : ''); ?>" />
        <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label" for="display_name"><?php echo lang('bf_display_name'); ?></label>
    <div class="col-sm-9">
        <input class="<?php echo $controlClass; ?> <?php echo form_error('display_name') ? $errorClass : ''; ?>" type="text" id="display_name" name="display_name" value="<?php echo set_value('display_name', isset($user) ? $user->display_name : ''); ?>" />
        <div class="invalid-feedback"><?php echo form_error('display_name'); ?></div>
    </div>
</div>
<?php if (settings_item('auth.login_type') !== 'email' || settings_item('auth.use_usernames')) : ?>
<div class="form-group row">
    <label class="col-sm-3 col-form-label" for="username"><?php echo lang('bf_username'); ?></label>
    <div class="col-sm-9">
        <input class="<?php echo $controlClass; ?> <?php echo form_error('username') ? $errorClass : ''; ?>" type="text" id="username" name="username" value="<?php echo set_value('username', isset($user) ? $user->username : ''); ?>" />
        <div class="invalid-feedback"><?php echo form_error('username'); ?></div>
    </div>
</div>
<?php endif; ?>
<div class="form-group row">
    <label class="col-sm-3 col-form-label<?php echo $registerClass; ?>" for="password"><?php echo lang('bf_password'); ?></label>
    <div class="col-sm-9">
        <input class="<?php echo $controlClass; ?> <?php echo form_error('password') ? $errorClass : ''; ?>" type="password" id="password" name="password" value="" />
        <div class="invalid-feedback"><?php echo form_error('password'); ?></div>
        <small class="form-text text-muted"><?php echo isset($password_hints) ? $password_hints : ''; ?></small>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label<?php echo $registerClass; ?>" for="pass_confirm"><?php echo lang('bf_password_confirm'); ?></label>
    <div class="col-sm-9">
        <input class="<?php echo $controlClass; ?> <?php echo form_error('pass_confirm') ? $errorClass : ''; ?>" type="password" id="pass_confirm" name="pass_confirm" value="" />
        <div class="invalid-feedback"><?php echo form_error('pass_confirm'); ?></div>
    </div>
</div>
<?php if ($editSettings) : ?>
<div class="form-group row<?php echo form_error('force_password_reset') ? $errorClass : ''; ?>">
    <div class="col-sm-9">
        <label class="checkbox" for="force_password_reset">
            <input type="checkbox" id="force_password_reset" name="force_password_reset" value="1" <?php echo set_checkbox('force_password_reset', empty($user->force_password_reset)); ?> />
            <?php echo lang('us_force_password_reset'); ?>
        </label>
    </div>
</div>
<?php
endif;

if (! empty($languages) && is_array($languages)) :
    if (count($languages) == 1) :
?>
<input type="hidden" id="language" name="language" value="<?php echo $languages[0]; ?>" />
<?php
    else :
?>
<div class="form-group row">
    <label class="col-sm-3 col-form-label" for="language"><?php echo lang('bf_language'); ?></label>
    <div class="col-sm-9">
        <select name="language" id="language" class="chzn-select <?php echo $controlClass; ?> <?php echo form_error('language') ? $errorClass : ''; ?>">
            <?php foreach ($languages as $language) : ?>
            <option value="<?php e($language); ?>" <?php echo set_select('language', $language, $defaultLanguage == $language); ?>>
                <?php e(ucfirst($language)); ?>
            </option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback"><?php echo form_error('language'); ?></div>
    </div>
</div>
<?php
    endif;
endif;
?>
<div class="form-group row  <?php echo form_error('timezones') ? $errorClass : ''; ?>">
    <label class="col-sm-3 col-form-label" for="timezones"><?php echo lang('bf_timezone'); ?></label>
    <div class="col-sm-9">
        <?php
        echo timezone_menu(
            set_value('timezones', isset($user) ? $user->timezone : $defaultTimezone),
            $controlClass,
            'timezones',
            array('id' => 'timezones')
        );
        ?>
        <div class="invalid-feedback"><?php echo form_error('timezones'); ?></div>
    </div>
</div>