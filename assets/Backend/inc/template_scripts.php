<?php
/**
 * template_scripts.php
 *
 * Author: pixelcave
 *
 * All vital JS scripts are included here
 *
 */
?>


<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo base_url('assets/Backend/js/vendor/jquery-2.1.4/jquery-2.1.4.min.js') ?>"%3E%3C/script%3E'));</script>
<!-- <script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo base_url('assets/Backend/js/vendor/jquery-ui-1.11.1/jquery.min.js') ?>"%3E%3C/script%3E'));</script> -->

<!-- Bootstrap.js, Jquery plugins and Custom JS code -->
<script type="text/javascript" src="<?php echo base_url('assets/Backend/js/vendor/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/Backend/js/vendor/alertify.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/Backend/js/plugins.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/Backend/js/app.js'); ?>"></script>

<!-- Modernizr (browser feature detection library) -->
<script type="text/javascript" src="<?php echo base_url('assets/Backend/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>

<script type="text/javascript">
	var $ = jQuery.noConflict();
</script>