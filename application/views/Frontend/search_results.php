<?php include 'assets/Frontend/inc/config.php'; ?>
<?php include 'assets/Frontend/inc/template_start.php'; ?>
<?php include 'assets/Frontend/inc/page_head.php'; ?>

<!-- Intro -->
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Search Results.</strong></h1>
    </div>
</section>
<!-- END Intro -->

<!-- Search Form -->
<section class="site-content site-section themed-background-muted">
    <div class="container">
        <div class="site-block">
            <form action="search_results.php" method="post">
                <div class="input-group input-group-lg">
                    <input type="text" id="site-search" name="site-search" class="form-control" placeholder="Search Site..">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- END Search Form -->

<!-- Quick Stats -->
<section class="site-content site-section-mini themed-background-default">
    <div class="container">
        <!-- Stats Row -->
        <div class="row">
            <div class="col-xs-6">
                <div class="counter site-block">
                    <span>30</span>
                    <small>Pages</small>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="counter site-block">
                    <span>27</span>
                    <small>Customers</small>
                </div>
            </div>
        </div>
        <!-- END Stats Row -->
    </div>
</section>
<!-- END Quick Stats -->

<!-- Search Results -->
<section class="site-content site-section">
    <div class="container">
        <div class="row row-items">
            <!-- Pages -->
            <div class="col-md-6">
                <h2 class="h3"><strong>Pages</strong></h2>
                <hr>
                <ul class="list-unstyled">
                    <li>
                        <h4>
                            <a href="javascript:void(0)"><strong>Web Application Template - Bootstrap Powered</strong></a><br>
                            <small><a href="javascript:void(0)" class="text-muted"><strong>http://example.com/project/</strong></a></small>
                        </h4>
                        <p>Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus.</p>
                    </li>
                    <li>
                        <h4>
                            <a href="javascript:void(0)"><strong>Web Application Template - Bootstrap Powered</strong></a><br>
                            <small><a href="javascript:void(0)" class="text-muted"><strong>http://example.com/project/</strong></a></small>
                        </h4>
                        <p>Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus.</p>
                    </li>
                    <li>
                        <h4>
                            <a href="javascript:void(0)"><strong>Web Application Template - Bootstrap Powered</strong></a><br>
                            <small><a href="javascript:void(0)" class="text-muted"><strong>http://example.com/project/</strong></a></small>
                        </h4>
                        <p>Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus.</p>
                    </li>
                    <li>
                        <h4>
                            <a href="javascript:void(0)"><strong>Web Application Template - Bootstrap Powered</strong></a><br>
                            <small><a href="javascript:void(0)" class="text-muted"><strong>http://example.com/project/</strong></a></small>
                        </h4>
                        <p>Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus.</p>
                    </li>
                    <li>
                        <h4>
                            <a href="javascript:void(0)"><strong>Web Application Template - Bootstrap Powered</strong></a><br>
                            <small><a href="javascript:void(0)" class="text-muted"><strong>http://example.com/project/</strong></a></small>
                        </h4>
                        <p>Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus.</p>
                    </li>
                </ul>
                <ul class="pagination">
                    <li class="active"><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><span>...</span></li>
                    <li><a href="javascript:void(0)">6</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
            <!-- END Pages -->

            <!-- Customers -->
            <div class="col-md-6">
                <h2 class="h3"><strong>Customers</strong></h2>
                <hr>
                <table class="table table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 100px;">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>15 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>23 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>2 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>6 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>7 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>7 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>3 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>9 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="javascript:void(0)">
                                    <img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar">
                                </a>
                            </td>
                            <td><a href="javascript:void(0)"><strong>19 projects</strong></a></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Facebook" class="btn btn-sm btn-info"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Twitter" class="btn btn-sm btn-primary"><i class="fa fa-twitter"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="pagination">
                    <li class="active"><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
            <!-- END Customers -->
        </div>
    </div>
</section>
<!-- END Search Results -->

<?php include 'assets/Frontend/inc/page_footer.php'; ?>
<?php include 'assets/Frontend/inc/template_scripts.php'; ?>
<?php include 'assets/Frontend/inc/template_end.php'; ?>