<?php

Assets::add_css(array(
    'vendor/bootstrap/css/bootstrap.min.css',
    'vendor/icofont/icofont.min.css',
    'vendor/boxicons/css/boxicons.min.css',
    'vendor/venobox/venobox.css',
    'vendor/aos/aos.css',
     'style.css',
     'custom.css'
));

Assets::add_js(  array(
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
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet"> 
    <link href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet"> 
   
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    
</head>
<body>

<?php echo theme_view('header'); ?>
<?php
    echo theme_view('_sitenav');
    echo Template::message();
    echo isset($content) ? $content : Template::content();
    echo theme_view('footer');
?>
    
 <!-- Vendor JS Files -->
  

  <!-- Template Main JS File -->
<?php echo Assets::js(); ?>
  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
        $('.datatable').DataTable();
    } );
    </script>
</body>


</html>