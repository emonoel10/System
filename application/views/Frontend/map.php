<?php include 'assets/Frontend/inc/config.php';?>
<?php $template['title'] = 'BCGIS | MAP';?>
<?php include 'assets/Frontend/inc/template_start.php';?>
<?php include 'assets/Frontend/inc/page_head.php';?>

<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Barangay Map</strong></h1>
    </div>
</section>

<section>
    <iframe src="<?php echo base_url('Map/index_content') ?>" id="frontMapContent" scrolling="no" frameborder="0"></iframe>
</section>

<?php include 'assets/Frontend/inc/page_footer.php';?>
<?php include 'assets/Frontend/inc/template_scripts.php';?>

<script src="<?=base_url();?>assets/Frontend/js/pages/map.js"></script>
<script>
    $(function () {
        Map.init();
    });
</script>

<?php include 'assets/Frontend/inc/template_end.php';?>