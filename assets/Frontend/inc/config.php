<?php

/* Template variables */
$template = array(
	'name' => 'Brgy. Cagangohan Geographical Information System',
	'author' => 'Team Season from DNSC',
	'robots' => 'noindex, nofollow',
	'title' => 'Brgy. Cagangohan GIS',
	'description' => 'Barangay Cagangohan Geographical Information System is a Web App created by Team Season from DNSC for Residencial Mapping and Population Statistical Reviewer to Brgy.Cagangohan',
	'keywords' => 'barangay cagangohan geographical information system, barangay cagangohan gis, bcgis, gis, panabo, panabo city, dnsc, davao del norte state college, barangay cagangohan, noel calonia',
	'active_page' => basename($_SERVER['PHP_SELF']),
);

/* Primary navigation array (the primary navigation will be created automatically based on this array) */
$primary_nav = array(
	// array(
	// 	'name' => 'Home',
	// 	'url' => 'Main',
	// ),
	array(
		'name' => 'Barangay Map',
		'url' => 'Map',
	),
	// array(
	// 	'name' => 'Fill-Up',
	// 	'sub' => array(
	// 		array(
	// 			'name' => 'Certificate of Clearance',
	// 			'url' => 'ClearanceForm',
	// 		),
	// 	),
	// ),
	array(
		'name' => 'About',
		'sub' => array(
			array(
				'name' => 'The Barangay',
				'url' => 'AboutBarangay',
			),
			array(
				'name' => 'Mission & Vision',
				'url' => 'AboutBarangayMV',
			),
			array(
				'name' => 'Barangay Officials',
				'url' => 'AboutBarangayOfficials',
			),
			array(
				'name' => 'Developers',
				'url' => 'AboutDevelopers',
			),
		),
	),
	array(
		'name' => 'Admin <i class="fa fa-arrow-right"></i>',
		'class' => 'featured',
		'url' => 'Login',
	),
);
