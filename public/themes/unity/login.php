<?php

Assets::add_css(array(
    'vendor/bootstrap/css/bootstrap.min.css',
    'vendor/icofont/icofont.min.css',
    'vendor/venobox/venobox.css',
    'vendor/aos/aos.css',
     'style.css',
    'custom.css'
));

Assets::add_js(  array(
    'vendor/jquery/jquery.min.js',
    'vendor/bootstrap/js/bootstrap.bundle.min.js',
    'vendor/jquery.easing/jquery.easing.min.js',
    'vendor/php-email-form/validate.js',
    'vendor/owl.carousel/owl.carousel.min.js',
    'vendor/isotope-layout/isotope.pkgd.min.js',
    'vendor/venobox/venobox.min.js',
    'vendor/aos/aos.js',
    'main.js' ));

$inline  = '$(".dropdown-toggle").dropdown();';
$inline .= '$(".tooltips").tooltip();';
Assets::add_js($inline, 'inline');

?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <title><?php
        echo isset($page_title) ? "{$page_title} : " : '';
        e(class_exists('Settings_lib') ? settings_item('site.title') : 'Bonfire');
    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php e(isset($meta_description) ? $meta_description : ''); ?>">
    <meta name="author" content="<?php e(isset($meta_author) ? $meta_author : ''); ?>">
   
   
   
    <?php
    /* Modernizr is loaded before CSS so CSS can utilize its features */
    echo Assets::js('modernizr-2.5.3.js');
    ?>
    <?php echo Assets::css(); ?>
    
    <!-- favicon code -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url(); ?>/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo base_url(); ?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet"> 
</head>
<body>

<?php echo theme_view('header'); ?>
<?php
    echo theme_view('_sitenav');
    echo isset($content) ? $content : Template::content();
    echo theme_view('footer');
?>
    
 <!-- Vendor JS Files -->
  

  <!-- Template Main JS File -->
<?php echo Assets::js(); ?>
</body>

</html>