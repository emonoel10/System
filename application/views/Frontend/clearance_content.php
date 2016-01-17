<?php include 'assets/Frontend/inc/config.php';
$template['title'] = "BCGIS | CERT. OF CLEARANCE";
?>
<?php include 'assets/Frontend/inc/template_start.php';?>
<?php include 'assets/Frontend/inc/page_head.php';?>

<!-- Intro -->
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Certification of Clearance</strong></h1>
    </div>
</section>

<section class="site-content site-section border-bottom">
    <div class="container text-center">
        <div class="row">
          <ul class="nav nav-tabs">
             <li class="active" id="step-li"><a id="stepBtn1" data-toggle="tab disable" href="#step1">Step 1</a></li>
             <li><a id="stepBtn2" onclick="activaTab('step2')" data-toggle="tab disable" href="#step2">Step 2</a></li>
             <li class="active" id="step-li"><a id="stepBtn1" data-toggle="tab disable" data-target="#step1">Step 1</a></li>
             <li><a id="stepBtn2" onclick="activaTab('step2')" data-toggle="tab disable" data-target="#step2">Step 2</a></li>
         </ul>
         <div class="tab-content">
            <div id="step1" class="tab-pane fade in active">
               <form action="<?php echo base_url(); ?>ClearanceForm/submitClearance" method="post" class="form-horizontal form-control-borderless">
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
                                <select name="status" id="status" class="form-control">
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
                                <div class="col-sm-12 col-md-2 col-lg-2" id="clearanceBtnForm">
                                    <button type="button" id="btnClear" class="btn btn-danger btn-effect-ripple">Clear</button>
                                </div>
                                <div class="col-sm-0 col-md-4 col-lg-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-0 col-md-2 col-lg-2"></div>
            </form>
        </div>

        <div id="step2" class="tab-pane fade in text-center">
           <form action="<?php echo base_url(); ?>ClearanceForm/submitClearance" method="POST" class="form-horizontal form-control-borderless">
            <div class="form-horizontal form-control-borderless">
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
                                    <button type="submit" id="btnPrintLabel" onclick="window.print()" class="btn btn-primary btn-effect-ripple">Print</button>
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
            </div>
        </form>
    </div>
</div>
</div>
</section>

<?php include 'assets/Frontend/inc/page_footer.php';?>
<?php include 'assets/Frontend/inc/template_scripts.php';?>
<script type="text/javascript" src="<?php base_url();?>assets/Frontend/js/pages/clearance.js"></script>
<?php include 'assets/Frontend/inc/template_end.php';?>
