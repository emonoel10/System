<?php include 'assets/Frontend/inc/config.php';?>
<?php include 'assets/Frontend/inc/template_start.php';?>
<?php include 'assets/Frontend/inc/page_head.php';?>

<!-- Intro -->
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Certification of Clearance</strong></h1>
    </div>
</section>
<!-- END Intro -->

<!-- Features #1 -->
<section class="site-content site-section border-bottom">
    <div class="container text-center">
        <div class="row">
          <ul class="nav nav-tabs">
              <li class="active" id="step-li"><a id="stepBtn1" data-toggle="tab disable" href="#step1">Step 1</a></li>
              <li><a id="stepBtn2" onclick="activaTab('step2')" data-toggle="tab disable" href="#step2">Step 2</a></li>
          </ul>
          <div class="tab-content">
            <div id="step1" class="tab-pane fade in active">
                <!-- <form action="<?php echo base_url(); ?>ClearanceForm/submitClearance" method="post" class="form-horizontal form-control-borderless"> -->
                <div class="col-sm-0 col-md-2 col-lg-2"></div>
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Full Name:</label>
                            <div class="col-md-9">
                                <input name="fname" id="fname" placeholder="Full Name" class="form-control" type="text">
                                <label class="help-block"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nickname/Aliases:</label>
                            <div class="col-md-9">
                                <input name="nname" id="nname" placeholder="Nickname/Aliases" class="form-control" type="text">
                                <label class="help-block"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Civil Status:</label>
                            <div class="col-md-9">
                            <select id="status" name="status" id="status" class="form-control">
                                    <option value="">---</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                                <label class="help-block"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth:</label>
                            <div class="col-md-9">
                                <input type="date" name="bday" id="bday" placeholder="dd MM yyyy" class="form-control bday-datepicker" max="2005-12-31">
                                <label class="help-block"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Place of Birth:</label>
                            <div class="col-md-9">
                                <input type="text" name="bPlace" id="bPlace" placeholder="Place of Birth" class="form-control" type="text">
                                <label class="help-block"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Complete Address:</label>
                            <div class="col-md-9">
                                <textarea name="comAddress" id="comAddress" placeholder="Complete Address" class="form-control"></textarea>
                                <label class="help-block"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">No. of Years in Present Address:</label>
                            <div class="col-md-9">
                                <input type="text" name="yearPesentAddress" id="yearPesentAddress" placeholder="No. of Years in Present Address" class="form-control"></input>
                                <label class="help-block"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Purpose of Barangay Clearance:</label>
                            <div class="col-md-9">
                                <textarea name="purpose" id="purpose" placeholder="Purpose of Barangay Clearance" class="form-control"></textarea>
                                <label class="help-block"></label>
                            </div>
                        </div>
                        <div style="margin-bottom: 10%;">
                            <div class="row">
                                <div class="col-sm-0 col-md-4 col-lg-4"></div>
                                <div class="col-sm-12 col-md-2 col-lg-2" id="clearanceBtnForm">
                                    <button type="submit" id="btnNext" onclick="activaTab('step2')" class="btn btn-primary btn-effect.ripple">Next</button>
                                </div>
                                <!-- <div class="col-sm-12 col-md-2 col-lg-2" id="clearanceBtnForm">
                                    <button type="button" id="btnClear" class="btn btn-danger btn-effect-ripple">Clear</button>
                                </div>
                                <div class="col-sm-0 col-md-4 col-lg-4"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-0 col-md-2 col-lg-2"></div>
                <!-- </form> -->
            </div>

            <div id="step2" class="tab-pane fade in text-center">
                <form action="<?php echo base_url(); ?>ClearanceForm/submitClearance" method="POST" class="form-horizontal form-control-borderless">
                    <div class="col-sm-0 col-md-2 col-lg-2"></div>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label">Full Name:</label>
                                <div>
                                    <input type="text" hidden class="form-control" class="form-control" name="fnamePrint" id="fnamePrint"/>
                                    <p name="fnamePrintLabel" id="fnamePrintLabel"> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nickname/Aliases:</label>
                                <div>
                                    <input type="text" hidden class="form-control" name="nnamePrint" id="nnamePrint"/>
                                    <p name="nnamePrintLabel" id="nnamePrintLabel"> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Civil Status:</label>
                                <div>
                                    <input type="text" hidden class="form-control" name="statusPrint" id="statusPrint"/>
                                    <p name="statusPrintLabel" id="statusPrintLabel"> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of Birth:</label>
                                <div>
                                    <input type="text" hidden class="form-control" name="bdayPrint" id="bdayPrint"/>
                                    <p name="bdayPrintLabel" id="bdayPrintLabel"> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Place of Birth:</label>
                                <div>
                                    <input type="text" hidden class="form-control" name="bPlacePrint" id="bPlacePrint"/>
                                    <p name="bPlacePrintLabel" id="bPlacePrintLabel"> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Complete Address:</label>
                                <div>
                                    <input type="text" hidden class="form-control" name="comAddressPrint" id="comAddressPrint"/>
                                    <p name="comAddressPrintLabel" id="comAddressPrintLabel"> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">No. of Years in Present Address:</label>
                                <div>
                                    <input type="text" hidden class="form-control" name="yearPresentAddressPrint" id="yearPresentAddressPrint"/>
                                    <p name="yearPresentAddressPrintLabel" id="yearPresentAddressPrintLabel"> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Purpose of Barangay Clearance:</label>
                                <div>
                                    <input type="text" hidden class="form-control" name="purposePrint" id="purposePrint"/>
                                    <p name="purposePrintLabel" id="purposePrintLabel"> </p>
                                </div>
                            </div>
                            <div style="margin-bottom: 10%; margin-left: -2%;">
                                <div class="row">
                                    <div class="col-sm-0 col-md-4 col-lg-5"></div>
                                    <div class="col-sm-12 col-md-2 col-lg-1" id="clearanceBtnForm">
                                        <button type="submit" id="btnPrintLabel" class="btn btn-primary btn-effect-ripple">Print</button>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-1" id="clearanceBtnForm">
                                        <button type="button" id="btnBack" onclick="activaTab('step1')" class="btn btn-info btn-effect-ripple">Back</button>
                                    </div>
                                    <div class="col-sm-0 col-md-4 col-lg-5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-0 col-md-2 col-lg-2"></div>
                </form>
            </div>
        </div>
    </div>
        <!-- <div class="row row-items">
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
        </div> -->
    </div>
</section>
<!-- END Features #1 -->

<!-- Features #2 -->
<!-- <section class="site-content site-section border-bottom">
    <div class="container text-center">
        <div class="row row-items">
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-amethyst" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="gi gi-eye_open"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Retina Ready</strong></h4>
                    <p class="feature-text text-muted">It will look crispy clear on high resolution screens and at the same time it will serve your high quality images as required.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-flat" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="fa fa-code"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Clean & Commented Code</strong></h4>
                    <p class="feature-text text-muted">The code is created with the developer in mind. It is clean, easy to follow, easy to replicate and at the same time well commented, so that you never feel lost.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-passion" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="gi gi-iphone_shake"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Fully Responsive</strong></h4>
                    <p class="feature-text text-muted">The User Interface will adjust to any screen size. It will look great on mobile devices and on desktops at the same time. No need to worry about the UI, just stay focused on the development.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- END Features #2 -->

<!-- Features #3 -->
<!-- <section class="site-content site-section border-bottom">
    <div class="container text-center">
        <div class="row row-items">
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-warning" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="gi gi-brush"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>7 Colors Themes</strong></h4>
                    <p class="feature-text text-muted"><strong>AppUI</strong> features 7 carefully chosen and integrated color themes to choose from (with 2 header & sidebar color variations each). It's like getting a new template every time you change the active color theme.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-info" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="gi gi-electricity"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Flexible Layout</strong></h4>
                    <p class="feature-text text-muted">Create the layout you want for your project in seconds. Would you like a static layout? A fixed header and sidebars? A fixed footer? An alternative sidebar? You can have it!</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-classy" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="fa fa-cogs"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Awesome Components</strong></h4>
                    <p class="feature-text text-muted"><strong>AppUI</strong> comes packed with so many awesome components. Calendar, CSS3 Animations, Form Wizards, Form Validation and Charts are only a small portion of them.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- END Features #3 -->

<!-- Features #4 -->
<!-- <section class="site-content site-section">
    <div class="container text-center">
        <div class="row row-items">
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-success" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="fa fa-check"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Saves you time</strong></h4>
                    <p class="feature-text text-muted">Time is of vital importance. <strong>AppUI</strong> will save you hundreds of hours of extra development. Start right away coding your functionality and see your project come to life months sooner.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="gi gi-globe_af"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Cross Browser Support</strong></h4>
                    <p class="feature-text text-muted"><strong>AppUI</strong> will play nice with all modern browsers such as Chrome, Firefox, Safari, Opera and the latest versions of Internet Explorer (IE9 and up).</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="javascript:void(0)" class="feature visibility-none themed-background-social" data-toggle="animation-appear" data-animation-class="animation-fadeInQuickInv" data-element-offset="-100">
                    <i class="gi gi-iphone"></i>
                </a>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Mobile First</strong></h4>
                    <p class="feature-text text-muted">The layout adjusts as we move up from mobile devices to large desktop screens and not the other way around. This speed things up a lot.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- END Features #4 -->

<!-- Quick Stats -->
<!-- <section class="site-content site-section themed-background-dark">
    <div class="container"> -->
        <!-- Stats Row -->
        <!-- CountTo (initialized in js/app.js), for more examples you can check out https://github.com/mhuggins/jquery-countTo -->
        <!-- <div class="row">
            <div class="col-sm-4">
                <div class="counter site-block">
                    <label data-toggle="countTo" data-to="2120" data-after="+"></label>
                    <small>Sales</small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="counter site-block">
                    <label data-toggle="countTo" data-to="530" data-after="+"></label>
                    <small>Services</small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="counter site-block">
                    <label data-toggle="countTo" data-to="3200" data-after="+"></label>
                    <small>Projects</small>
                </div>
            </div>
        </div> -->
        <!-- END Stats Row -->
    <!-- </div>
</section> -->
<!-- END Quick Stats -->

<!-- Sign Up Action -->
<!-- <section class="site-content site-section">
    <div class="container">
        <h2 class="site-heading text-center">Sign up today and receive <strong>30% discount</strong>!</h2>
        <div class="site-block text-center">
            <form action="features.php" method="post" class="form-inline" onsubmit="return false;">
                <div class="form-group">
                    <label class="sr-only" for="register-username">Username</label>
                    <input type="text" id="register-username" name="register-username" class="form-control input-lg" placeholder="Choose a username..">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="register-password">Password</label>
                    <input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="..and a password!">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-success">Get Started!</button>
                </div>
            </form>
        </div>
    </div>
</section> -->
<!-- END Sign Up Action -->

<?php include 'assets/Frontend/inc/page_footer.php';?>
<?php include 'assets/Frontend/inc/template_scripts.php';?>
<script type="text/javascript" src="<?php base_url();?>assets/Frontend/js/pages/clearance.js"></script>
<?php include 'assets/Frontend/inc/template_end.php';?>