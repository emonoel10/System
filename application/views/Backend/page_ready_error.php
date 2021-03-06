<?php include 'assets/Backend/inc/config.php'; ?>
<?php include 'assets/Backend/inc/template_start.php'; ?>

<!-- Full Background -->
<!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
<img src="<?=base_url()?>assets/Backend/img/placeholders/layout/error_full_bg.jpg" alt="Full Background" class="full-bg full-bg-bottom animation-pulseSlow">
<!-- END Full Background -->

<!-- Error Container -->
<div id="error-container">
    <div class="row text-center">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-light animation-fadeInQuick"><strong>Feeling Lost?</strong></h1>
            <h2 class="text-muted animation-fadeInQuickInv"><em>We sorry but this page can't be found..</em></h2>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <?php
                $prev_url = trim(current_url(),'localhost/System');
            ?>
            <a href="" onclick="window.history.back();" class="btn btn-effect-ripple btn-default"><i class="fa fa-arrow-left"></i> Go back</a>
        </div>
    </div>
</div>
<!-- END Error Container -->

<?php include 'assets/Backend/inc/template_end.php'; ?>