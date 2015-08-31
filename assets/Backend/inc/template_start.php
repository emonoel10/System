<?php
/**
 * template_start.php
 *
 * Author: pixelcave
 *
 * The first block of code used in every page of the template
 *
 */
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?php echo $template['title'] ?></title>

        <meta name="description" content="<?php echo $template['description'] ?>">
        <meta name="author" content="<?php echo $template['author'] ?>">
        <meta name="robots" content="<?php echo $template['robots'] ?>">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png">
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/Backend/images/Ph_seal_davao_del_norte_panabo_city.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/Backend/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/Backend/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/Backend/css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        <?php if ($template['theme']) { ?><link rel="stylesheet" href="<?= base_url(); ?>assets/Backend/css/themes/<?php echo $template['theme']; ?>.css" id="theme-link"><?php } ?>

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/Backend/css/themes.css">

        <!-- Animation Stylesheets -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/Backend/css/animate.min.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->

    </head>
    <body id="login-body">
