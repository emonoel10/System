<div id="sidebar">
    <div id="sidebar-brand" class="themed-background">
        <a class="sidebar-title btn-effect-ripple" style="cursor: default;">
            <i><img src="<?=base_url();?>assets/Backend/images/CagangohanPics/logoCagangohan.png" style="width: 30px; height: 30px; margin-left: -5px;"/></i> <span class="sidebar-nav-mini-hide animation-fadeIn" style="font-size: 13px;">Brgy.Cagangohan <strong>GIS</strong></span>
        </a>
    </div>

    <div id="sidebar-scroll">
        <div class="sidebar-content">
            <?php if ($primary_nav) {
	?>
            <ul class="sidebar-nav">
                <?php foreach ($primary_nav as $key => $link) {
		$link_class = '';
		$li_active = '';
		$menu_link = '';
		$subAnimate = 'fadeInLeft animated';

		// Get 1st level link's vital info
		$url = (isset($link['url']) && $link['url']) ? $link['url'] : '#';
		$active = (isset($link['url']) && ($template['active_page'] == $link['url'])) ? ' active' : '';
		$icon = (isset($link['icon']) && $link['icon']) ? '<i class="' . $link['icon'] . ' sidebar-nav-icon"></i>' : '';

		// Check if the link has a submenu
		if (isset($link['sub']) && $link['sub']) {
			// Since it has a submenu, we need to check if we have to add the class active
			// to its parent li element (only if a 2nd or 3rd level link is active)
			foreach ($link['sub'] as $sub_link) {
				if (in_array($template['active_page'], $sub_link)) {
					$li_active = ' class="active"';
					break;
				}

				// 3rd level links
				if (isset($sub_link['sub']) && $sub_link['sub']) {
					foreach ($sub_link['sub'] as $sub2_link) {
						if (in_array($template['active_page'], $sub2_link)) {
							$li_active = ' class="active"';
							break;
						}
					}
				}
			}

			$menu_link = 'sidebar-nav-menu';
		}

		// Create the class attribute for our link
		if ($menu_link || $active) {
			$link_class = ' class="' . $menu_link . $active . '"';
		}
		?>
                <?php if ($url == 'separator') { // if it is a separator and not a link ?>
                <li class="sidebar-separator fadeIn animated">
                    <i class="fa fa-ellipsis-h"></i>
                </li>
                <?php } else {
			// If it is a link ?>
                <li<?php echo $li_active; ?>>
                    <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><?php }
			echo $icon;?><span class="sidebar-nav-mini-hide"><?php echo $link['name']; ?></span></a>
                    <?php if (isset($link['sub']) && $link['sub']) {
				// if the link has a submenu ?>
                    <ul class="fadeIn animated">
                        <?php foreach ($link['sub'] as $sub_link) {
					$link_class = '';
					$li_active = '';
					$submenu_link = '';

					// Get 2nd level link's vital info
					$url = (isset($sub_link['url']) && $sub_link['url']) ? $sub_link['url'] : '#';
					$active = (isset($sub_link['url']) && ($template['active_page'] == $sub_link['url'])) ? ' active' : '';

					// Check if the link has a submenu
					if (isset($sub_link['sub']) && $sub_link['sub']) {
						// Since it has a submenu, we need to check if we have to add the class active
						// to its parent li element (only if a 3rd level link is active)
						foreach ($sub_link['sub'] as $sub2_link) {
							if (in_array($template['active_page'], $sub2_link)) {
								$li_active = ' class="active"';
								break;
							}
						}

						$submenu_link = 'sidebar-nav-submenu';
					}

					if ($submenu_link || $active) {
						$link_class = ' class="' . $submenu_link . $active . ' fadeIn animated"';
					}
					?>
                        <li<?php echo $li_active; ?> class="<?php echo $subAnimate; ?>">
                            <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php if (isset($sub_link['sub']) && $sub_link['sub']) {?><i class="fa fa-chevron-left sidebar-nav-indicator"></i><?php }
					echo $sub_link['name'];?></a>
                            <?php if (isset($sub_link['sub']) && $sub_link['sub']) {
						?>
                                <ul>
                                    <?php foreach ($sub_link['sub'] as $sub2_link) {
							// Get 3rd level link's vital info
							$url = (isset($sub2_link['url']) && $sub2_link['url']) ? $sub2_link['url'] : '#';
							$active = (isset($sub2_link['url']) && ($template['active_page'] == $sub2_link['url'])) ? ' class="active"' : '';
							?>
                                    <li>
                                        <a href="<?php echo $url; ?>"<?php echo $active+" fadeInLeft animated" ?>><?php echo $sub2_link['name']; ?></a>
                                    </li>
                                    <?php }
						?>
                                </ul>
                            <?php }
					?>
                        </li>
                        <?php }
				?>
                    </ul>
                    <?php }
			?>
                </li>
                <?php }
		?>
                <?php }
	?>
            </ul>
            <?php }
?>

            <div class="sidebar-section sidebar-nav-mini-hide">

            </div>
        </div>
    </div>

    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
        <div class="text-center">
            <small>Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank"><?php echo $template['author']; ?></a></small><br>
            <small><span id="year-copy"></span> &copy; <a href="http://goo.gl/RcsdAh" target="_blank"><?php echo $template['name'] . ' ' . $template['version']; ?></a></small>
        </div>
    </div>
</div>
