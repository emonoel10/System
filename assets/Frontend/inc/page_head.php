<div id="page-container">
	<header>
		<div class="container">
			<a href="<?php echo base_url(); ?>" class="site-logo text-center">
				<img src="assets/Frontend/images/CagangohanPics/logoCagangohan.png" style="height: 93%; margin-top: -1.5%; width: 15%;"/> Brgy. Cagangohan <strong>GIS</strong>
			</a>

			<nav>
				<a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">
					Menu
				</a>
				<?php if ($primary_nav) {
	?>
					<ul class="site-nav">
						<?php foreach ($primary_nav as $key => $link) {
		$link_class = '';
		$li_active = '';
		$menu_link = '';

		// Get 1st level link's vital info
		$url = (isset($link['url']) && $link['url']) ? $link['url'] : 'javascript:void(0)';
		$active = (isset($link['url']) && ($template['active_page'] == $link['url'])) ? 'active' : '';

		// Check if the link has a submenu
		if (isset($link['sub']) && $link['sub']) {
			// Since it has a submenu, we need to check if we have to add the class active
			// to its parent li element (only if a 2nd level link is active)
			foreach ($link['sub'] as $sub_link) {
				if (in_array($template['active_page'], $sub_link)) {
					$li_active = ' class="active"';
					break;
				}
			}

			$menu_link = 'site-nav-sub';
		}

		// Create the class attribute for our link
		if ($menu_link) {
			$link_class = ' ' . $menu_link;
		}

		if ($active) {
			$link_class .= ' ' . $active;
		}

		if (isset($link['class']) && $link['class']) {
			$link_class .= ' ' . $link['class'];
		}
		?>
							<li<?php echo $li_active; ?>>
							<a href="<?php echo $url; ?>"<?php if ($link_class) {echo ' class="' . trim($link_class) . '"';}
		?>><?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?><i class="fa fa-angle-down site-nav-arrow"></i><?php }
		echo $link['name'];?></a>
								<?php if (isset($link['sub']) && $link['sub']) {
			// if the link has a submenu ?>
			<ul>
				<?php foreach ($link['sub'] as $sub_link) {
				$link_class = '';
				$li_active = '';

				// Get 2nd level link's vital info
				$url = (isset($sub_link['url']) && $sub_link['url']) ? $sub_link['url'] : '#';
				$active = (isset($sub_link['url']) && ($template['active_page'] == $sub_link['url'])) ? 'active' : '';

				if ($active) {
					$link_class = ' class="' . $active . '"';
				}
				?>
					<li<?php echo $li_active; ?>>
					<a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php echo $sub_link['name']; ?></a>
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
</nav>
</div>
</header>
