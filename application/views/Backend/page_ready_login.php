<?php
include 'assets/Backend/inc/config.php';
$template['title'] = 'BCGIS | LOGIN';
$template['page_preloader'] = true;
?>
<?php include 'assets/Backend/inc/template_start.php';?>

<!-- Login Container -->
<div id="login-container" class="fadeIn animated">
    <!-- Login Header -->
    <h1 class="h3 text-light text-center push-top-bottom fadeIn animated">
        <div class="row">
            <div class="col-lg-3 fadeIn animated">
                <img src="<?=base_url();?>assets/Backend/images/CagangohanPics/logoCagangohan.png" style="width: 95px; height: 80px;"/>
            </div>
            <div class="col-lg-9 fadeIn animated">
                <strong>Brgy. Cagangohan Geographical Information System</strong>
            </div>
        </div>
    </h1>
    <!-- END Login Header -->

    <!-- Login Block -->
    <div class="block fadeIn animated">
        <!-- Login Title -->
        <div class="block-title">
            <div class="col-xs-10">
                <h2>Administration Login</h2>
            </div>
            <div class="col-xs-2 text-center">
                <a href="<?=base_url()?>" data-toggle="tooltip" title="Back to Main Page"><i class="fa fa-arrow-circle-o-left fa-align-center fa-adjust" id="loginBackArrow"></i></a>
            </div>
        </div>
        <!-- END Login Title -->

        <!-- Login Form -->
        <form id="form-login" action="<?=base_url();?>Login/login" method="POST" class="form-horizontal">
            <br><br>
            <div class="alert alert-danger" id="response">
                <center id="responseMsg">Invalid Username or Password.</center>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" id="login-username" name="login-username" class="form-control" placeholder="Username..">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="password" id="login-password" name="login-password" class="form-control" placeholder="Password..">
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-sm-offset-2 col-sm-8 text-center">
                    <center>
                        <button type="submit" id="login-button" name="login-button" class="btn btn-effect-ripple btn-block btn-primary"><i class="fa fa-check"></i> Sign In</button>
                    </center>
                </div>
            </div>
        </form>
        <!-- END Login Form -->
    </div>
    <!-- END Login Block -->

    <!-- Footer -->
    <footer class="text-muted text-center fadeIn animated">
        <small><span id="year-copy"></span> &copy; <a href="#"><?php echo $template['name'] . ' ' . $template['version']; ?></a></small>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Login Container -->

<?php include 'assets/Backend/inc/template_scripts.php';?>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url();?>assets/Backend/js/pages/readyLogin.js"></script>
<script>
    $(function () {
        ReadyLogin.init();
    });
</script>

<?php include 'assets/Backend/inc/template_end.php';?>
