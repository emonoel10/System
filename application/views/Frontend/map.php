<?php include 'assets/Frontend/inc/config.php';
$template['title'] = 'BCGIS | ABOUT | MAP';
?>
<?php include 'assets/Frontend/inc/template_start.php';?>
<?php include 'assets/Frontend/inc/page_head.php';?>

<!-- Intro -->
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Barangay Map</strong></h1>
    </div>
</section>
<!-- END Intro -->

<!-- Plans -->
<section class="site-content site-section">
    <div class="container">
        <div class="site-block">
            <div class="row">
                <iframe src="<?php echo base_url('FrontMapContent') ?>" id="frontMapContent" scrolling="no" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</section>

<?php include 'assets/Frontend/inc/page_footer.php';?>
<?php include 'assets/Frontend/inc/template_scripts.php';?>

<script type="text/javascript">
    $('iframe').load(function() {
     iFrameResize({log: false, heightCalculationMethod: 'bodyScroll'});
 });
</script>


<?php include 'assets/Frontend/inc/template_end.php';?>