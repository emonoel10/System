<?php
/**
 * page_footer.php
 *
 * Author: pixelcave
 *
 * The footer of each page
 *
 */
?>
    <!-- Footer -->
    <footer class="site-footer site-section site-section-light">
        <div class="container">
            <!-- Footer Links -->
            <div class="row">
                <div class="col-sm-3">
                    <h4 class="footer-heading">Barangay</h4>
                    <ul class="footer-nav ul-breath list-unstyled">
                        <li><a href="<?php echo base_url(); ?>AboutBarangay">About Us</a></li>
                        <li><a href="<?php echo base_url(); ?>AboutTeam">Developers</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h4 class="footer-heading">Need support?</h4>
                    <ul class="footer-nav footer-nav-links list-inline">
                        <li><a href="javascript:void(0)"><i class="fa fa-fw fa-support"></i> FAQ</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h4 class="footer-heading">We are social!</h4>
                    <ul class="footer-nav footer-nav-links list-inline">
                        <li><a href="facebook.com/bcgis" class="social-facebook" title="Like our Facebook page">&nbsp<i class="fa fa-fw fa-facebook"></i>&nbsp</a></li>
                        <li><a href="google.com/bcgis" class="social-google-plus" title="Like our Google+ page">&nbsp<i class="fa fa-fw fa-google-plus"></i>&nbsp</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h4 class="footer-heading"><a href="<?=base_url();?>"><?php echo $template['name']; ?></a></h4>
                    <em><span id="year-copy"></span></em> &copy; Crafted by <a href="facebook.com/team_season">Team Season from DNSC</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<a href="javascript:void(0)" id="to-top">&nbsp<i class="fa fa-fw fa-arrow-up">&nbsp</i></a>
