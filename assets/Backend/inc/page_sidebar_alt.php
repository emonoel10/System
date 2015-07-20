<?php
/**
 * page_sidebar_alt.php
 *
 * Author: pixelcave
 *
 * The alternative sidebar of each page
 *
 */
?>
<!-- Alternative Sidebar -->
<div id="sidebar-alt" tabindex="-1" aria-hidden="true">
    <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
    <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll-alt">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Settings -->
            <div class="sidebar-section">
                <center>
                <h2 class="text-light">UI Themes</h2>
                <br><br>
                <form action="index.php" method="post" class="form-horizontal form-control-borderless" onsubmit="return false;">
                    <div class="form-group remove-margin">
                        <ul class="sidebar-themes clearfix">
                            <li>
                                <a href="javascript:void(0)" class="themed-background-default" data-toggle="tooltip" title="Default" data-theme="assets/Backend/css/themes/default" data-theme-navbar="navbar-inverse" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-side themed-background-dark-default"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-classy" data-toggle="tooltip" title="Classy" data-theme="assets/Backend/css/themes/classy.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-side themed-background-dark-classy"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-social" data-toggle="tooltip" title="Social" data-theme="assets/Backend/css/themes/social.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-side themed-background-dark-social"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-flat" data-toggle="tooltip" title="Flat" data-theme="assets/Backend/css/themes/flat.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-side themed-background-dark-flat"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-amethyst" data-toggle="tooltip" title="Amethyst" data-theme="assets/Backend/css/themes/amethyst.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-side themed-background-dark-amethyst"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-creme" data-toggle="tooltip" title="Creme" data-theme="assets/Backend/css/themes/creme.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-side themed-background-dark-creme"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-passion" data-toggle="tooltip" title="Passion" data-theme="assets/Backend/css/themes/passion.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-side themed-background-dark-passion"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-default" data-toggle="tooltip" title="Default + Light Sidebar" data-theme="assets/Backend/css/themes/default" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light" style="width:57px; height:30px;">
                                    <span class="section-side"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-classy" data-toggle="tooltip" title="Classy + Light Sidebar" data-theme="assets/Backend/css/themes/classy.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light" style="width:57px; height:30px;">
                                    <span class="section-side"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-social" data-toggle="tooltip" title="Social + Light Sidebar" data-theme="assets/Backend/css/themes/social.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light" style="width:57px; height:30px;">
                                    <span class="section-side"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-flat" data-toggle="tooltip" title="Flat + Light Sidebar" data-theme="assets/Backend/css/themes/flat.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light" style="width:57px; height:30px;">
                                    <span class="section-side"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-amethyst" data-toggle="tooltip" title="Amethyst + Light Sidebar" data-theme="assets/Backend/css/themes/amethyst.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light" style="width:57px; height:30px;">
                                    <span class="section-side"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-creme" data-toggle="tooltip" title="Creme + Light Sidebar" data-theme="assets/Backend/css/themes/creme.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light" style="width:57px; height:30px;">
                                    <span class="section-side"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-passion" data-toggle="tooltip" title="Passion + Light Sidebar" data-theme="assets/Backend/css/themes/passion.css" data-theme-navbar="navbar-inverse" data-theme-sidebar="sidebar-light" style="width:57px; height:30px;">
                                    <span class="section-side"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-default" data-toggle="tooltip" title="Default + Light Header" data-theme="assets/Backend/css/themes/default" data-theme-navbar="navbar-default" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-header"></span>
                                    <span class="section-side themed-background-dark-default"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-classy" data-toggle="tooltip" title="Classy + Light Header" data-theme="assets/Backend/css/themes/classy.css" data-theme-navbar="navbar-default" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-header"></span>
                                    <span class="section-side themed-background-dark-classy"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-social" data-toggle="tooltip" title="Social + Light Header" data-theme="assets/Backend/css/themes/social.css" data-theme-navbar="navbar-default" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-header"></span>
                                    <span class="section-side themed-background-dark-social"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-flat" data-toggle="tooltip" title="Flat + Light Header" data-theme="assets/Backend/css/themes/flat.css" data-theme-navbar="navbar-default" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-header"></span>
                                    <span class="section-side themed-background-dark-flat"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-amethyst" data-toggle="tooltip" title="Amethyst + Light Header" data-theme="assets/Backend/css/themes/amethyst.css" data-theme-navbar="navbar-default" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-header"></span>
                                    <span class="section-side themed-background-dark-amethyst"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-creme" data-toggle="tooltip" title="Creme + Light Header" data-theme="assets/Backend/css/themes/creme.css" data-theme-navbar="navbar-default" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-header"></span>
                                    <span class="section-side themed-background-dark-creme"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-passion" data-toggle="tooltip" title="Passion + Light Header" data-theme="assets/Backend/css/themes/passion.css" data-theme-navbar="navbar-default" data-theme-sidebar="" style="width:57px; height:30px;">
                                    <span class="section-header"></span>
                                    <span class="section-side themed-background-dark-passion"></span>
                                    <span class="section-content"></span>
                                </a>
                            </li>
                        </ul>
                        <br>
                        <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">Close</button>
                    </div>
                </form>
                </center>
            </div>
            <!-- END Settings -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Alternative Sidebar -->

