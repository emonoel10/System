<!-- Header -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!--
    Available header.navbar classes:

    'navbar-default'            for the default light header
    'navbar-inverse'            for an alternative dark header

    'navbar-fixed-top'          for a top fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
        'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

    'navbar-fixed-bottom'       for a bottom fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
        'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
-->
<header class="navbar<?php if ($template['header_navbar']) {echo ' ' . $template['header_navbar'];}
?><?php if ($template['header']) {echo ' ' . $template['header'];}
?>">
    <ul class="nav navbar-nav-custom">
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                <i class="fa fa-bars fa-fw animation-fadeInLeft" id="sidebar-toggle-full"></i>
            </a>
        </li>

        <?php if ($template['header_link']) {?>
        <!-- Header Link -->
        <li class="hidden-xs animation-fadeInQuick">
            <a href=""><strong><?php echo $template['header_link']; ?></strong></a>
        </li>
        <?php }
?>
    </ul>

    <ul class="nav navbar-nav-custom pull-right">
        <li>
            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
                <i class="gi gi-settings"></i>
            </a>
        </li>

        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <!-- <img src="<?=base_url();?>assets/Backend/img/placeholders/avatars/avatar9.jpg" alt="avatar"> -->
                <img src="<?=base_url();?>assets/Backend/images/CagangohanPics/logoCagangohan.png" alt="avatar">
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-header">
                    <strong>ADMINISTRATOR</strong>
                </li>
                <li>
                    <a href="Login/logout">
                        <i class="fa fa-power-off fa-fw pull-right"></i>
                        Log out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>
