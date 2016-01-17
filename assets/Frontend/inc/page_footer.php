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
                <div class="col-sm-4">
                    <h4 class="footer-heading">Barangay</h4>
                    <ul class="footer-nav ul-breath list-unstyled">
                        <li><a href="<?php echo base_url(); ?>AboutBarangay">About Us</a></li>
                        <li><a href="<?php echo base_url(); ?>AboutTeam">Dev Team</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h4 class="footer-heading">Need support?</h4>
                    <ul class="footer-nav footer-nav-links list-inline">
                        <li><a href="javascript:void(0)"><i class="fa fa-fw fa-book"></i> Knowledge Base</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-fw fa-support"></i> FAQ</a></li>
                    </ul>
                    <h4 class="footer-heading">We are social!</h4>
                    <ul class="footer-nav footer-nav-links list-inline">
                        <li><a href="javascript:void(0)" class="social-facebook" data-toggle="tooltip" title="Like our Facebook page"><i class="fa fa-fw fa-facebook"></i></a></li>
                        <!-- <li><a href="javascript:void(0)" class="social-twitter" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-fw fa-twitter"></i></a></li> -->
                        <li><a href="javascript:void(0)" class="social-google-plus" data-toggle="tooltip" title="Like our Google+ page"><i class="fa fa-fw fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h4 class="footer-heading"><a href="http://goo.gl/RcsdAh"><?php echo $template['name']; ?></a></h4>
                    <em><span id="year-copy"></span></em> &copy; Crafted <!-- with <i class="fa fa-heart text-danger"></i> --> by <a href="http://goo.gl/WCS84b">CMBTC from DNSC</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<a href="#" id="to-top"><i class="fa fa-arrow-up"></i></a>
