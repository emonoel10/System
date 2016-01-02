<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Intro -->
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container text-center">
        <h1 class="animation-fadeInQuickInv"><strong>Awesome Project</strong></h1>
    </div>
</section>
<!-- END Intro -->

<!-- Project Navigation -->
<section class="site-content site-section-mini themed-background-muted border-bottom">
    <div class="container">
        <div class="site-block clearfix">
            <div class="btn-group pull-right">
                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Previous Project">
                    <i class="fa fa-chevron-left"></i>
                </a>
                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Next Project">
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
            <a href="portfolio.php" class="btn btn-danger pull-left">
                <i class="fa fa-arrow-left"></i> All projects
            </a>
        </div>
    </div>
</section>
<!-- END Project Navigation -->

<!-- Project Info -->
<section class="site-content site-section border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 site-block">
                <!-- Carousel & Info -->
                <div class="row">
                    <div class="col-sm-7">
                        <div id="project-carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner text-center">
                                <div class="active item">
                                    <img src="img/placeholders/photos/photo22.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img src="img/placeholders/photos/photo23.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img src="img/placeholders/photos/photo24.jpg" alt="">
                                </div>
                            </div>
                            <!-- END Wrapper for slides -->

                            <!-- Controls -->
                            <a class="left carousel-control" href="#project-carousel" data-slide="prev">
                                <span>
                                    <i class="fa fa-chevron-left"></i>
                                </span>
                            </a>
                            <a class="right carousel-control" href="#project-carousel" data-slide="next">
                                <span>
                                    <i class="fa fa-chevron-right"></i>
                                </span>
                            </a>
                            <!-- END Controls -->
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td style="width: 40%;"><strong>Category</strong></td>
                                    <td class="text-right">Web solution</td>
                                </tr>
                                <tr>
                                    <td><strong>Client</strong></td>
                                    <td class="text-right">Travel Company</td>
                                </tr>
                                <tr>
                                    <td><strong>Budget</strong></td>
                                    <td class="text-right">$120.000</td>
                                </tr>
                                <tr>
                                    <td><strong>Completion</strong></td>
                                    <td class="text-right">6 Months</td>
                                </tr>
                                <tr>
                                    <td><strong>URL</strong></td>
                                    <td class="text-right"><a href="javascript:void(0)" class="label label-primary">http://example.com</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Carousel & Info -->

                <!-- Project Details -->
                <h3><strong>Project Description</strong></h3>
                <p>Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum.</p>
                <p>In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <!-- END Project Details -->
            </div>
        </div>
    </div>
</section>
<!-- END Project Info -->

<!-- Features -->
<section class="site-content site-section themed-background-muted border-bottom">
    <div class="container text-center">
        <div class="row row-items">
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-danger" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="fa fa-fire"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Bootstrap Powered</strong></h4>
                    <p class="feature-text text-muted">Bootstrap is a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development. <strong>AppUI</strong> was built on top, extending it to a large degree.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-success" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="gi gi-pizza"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>1200+ Font Based Icons</strong></h4>
                    <p class="feature-text text-muted">With so many unique icons included in <strong>AppUI</strong>, you don't have to worry about running out. Let's not talk about possible color and size variations.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-info" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="fa fa-book"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Documentation Included</strong></h4>
                    <p class="feature-text text-muted"><strong>AppUI</strong> comes packed with a great documentation which covers all the basics to get you familiar with template's structure, files and plugins. It is the best way to get started.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Features -->

<!-- Testimonial -->
<section class="site-content site-section">
    <div class="container text-center">
        <blockquote class="site-block">
            <p><img src="img/placeholders/avatars/avatar13@2x.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
            <h3>A big thanks! Our web app looks great!</h3>
            <footer><em><strong>Maria Clark</strong>, http://example.com/</em></footer>
        </blockquote>
    </div>
</section>
<!-- END Testimonial -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>