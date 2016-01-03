<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FrontMapContent extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->Model('Maps_model');
	}

	public function mapSearchDataInMarker() {
		$results = array();
		if (isset($_POST['searchDataToMarker'])) {
			$searchData = $_POST['searchDataToMarker'];
			$query = $this->db->query("
<<<<<<< HEAD
				SELECT * FROM resident
				WHERE name LIKE '%{$searchData}%'
				OR mname LIKE '%{$searchData}%'
				OR lname LIKE '%{$searchData}%'
				OR gender LIKE '%{$searchData}%'
				OR bday LIKE '%{$searchData}%'
				OR age LIKE '%{$searchData}%'
				OR citizenship LIKE '%{$searchData}%'
				OR occupation LIKE '%{$searchData}%'
				OR status LIKE '%{$searchData}%'
				OR purok LIKE '%{$searchData}%'
				OR resAddress LIKE '%{$searchData}%'
				OR perAddress LIKE '%{$searchData}%'
				OR email LIKE '%{$searchData}%'
				OR telNum LIKE '%{$searchData}%'
				OR cpNum LIKE '%{$searchData}%'
				");
=======
                SELECT * FROM resident
                WHERE name LIKE '%{$searchData}%'
                OR mname LIKE '%{$searchData}%'
                OR lname LIKE '%{$searchData}%'
                OR gender LIKE '%{$searchData}%'
                OR bday LIKE '%{$searchData}%'
                OR age LIKE '%{$searchData}%'
                OR citizenship LIKE '%{$searchData}%'
                OR occupation LIKE '%{$searchData}%'
                OR status LIKE '%{$searchData}%'
                OR purok LIKE '%{$searchData}%'
                OR resAddress LIKE '%{$searchData}%'
                OR perAddress LIKE '%{$searchData}%'
                OR email LIKE '%{$searchData}%'
                OR telNum LIKE '%{$searchData}%'
                OR cpNum LIKE '%{$searchData}%'
            ");
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
			foreach ($query->result() as $searchResult) {
				$results[] = $searchResult;
			}
		}
		header('Content-Type: application/json');
		echo json_encode($results);
	}

	public function index() {

<<<<<<< HEAD
		//Brgy. Cagangohan Bounds:
		// SW: 7.274053,125.666105
		// NE: 7.2967,125.730692

=======
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$this->load->helper('url');

		$this->load->library('googlemaps');
		$config = array();
		$config['center'] = '7.282397, 125.683499';
		$config['zoom'] = 15;
<<<<<<< HEAD
		$config['minzoom'] = 14;
		$config['disableStreetViewControl'] = TRUE;
		$config['map_type'] = 'HYBRID';
		$config['cluster'] = TRUE;
		$config['onboundschanged'] = "
		var strictBounds = new google.maps.LatLngBounds(
 		new google.maps.LatLng(7.274053,125.666105),
 		new google.maps.LatLng(7.2967,125.730692));
     		if (strictBounds.contains(map.getCenter())) return;

	     var c = map.getCenter(),
	         x = c.lng(),
	         y = c.lat(),
	         maxX = strictBounds.getNorthEast().lng(),
	         maxY = strictBounds.getNorthEast().lat(),
	         minX = strictBounds.getSouthWest().lng(),
	         minY = strictBounds.getSouthWest().lat();

	     if (x < minX) x = minX;
	     if (x > maxX) x = maxX;
	     if (y < minY) y = minY;
	     if (y > maxY) y = maxY;

	     map.setCenter(new google.maps.LatLng(y, x));
		";
=======
		$config['map_height'] = '100%';
		$config['map_width'] = '100%';
		$config['map_type'] = 'HYBRID';
		$config['cluster'] = TRUE;
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021

		$this->googlemaps->initialize($config);

		$polyline = array(); //cagangohan
		$polyline['strokeColor'] = 'red';
		$polyline['points'] = array('7.292363, 125.667018', '7.291958, 125.671030', '7.292022, 125.673777', '7.291532, 125.675864', '7.292884, 125.676464', '7.292809, 125.677291', '7.292682, 125.680069', '7.292283, 125.682475', '7.291916, 125.684653', '7.290319, 125.685536', '7.290787, 125.688089', '7.292937, 125.689033', '7.294427, 125.689951', '7.296428, 125.691737', '7.295853, 125.692123', '7.295300, 125.692273', '7.293703, 125.694247', '7.294001, 125.694612', '7.294172, 125.697123', '7.291000, 125.698678', '7.289723, 125.697091', '7.287808, 125.695717', '7.285573, 125.691866', '7.284466, 125.690793', '7.282657, 125.689763', '7.279996, 125.688411', '7.278123, 125.686930', '7.277208, 125.686287', '7.276059, 125.685600', '7.274207, 125.683604', '7.274037, 125.683175', '7.275675, 125.678412', '7.275697, 125.673975', '7.280188, 125.674565', '7.280156, 125.672009', '7.286728, 125.674788', '7.287308, 125.673302', '7.288127, 125.669896', '7.287137, 125.669834', '7.287196, 125.665787', '7.288962, 125.666312', '7.288718, 125.667889', '7.290819, 125.667830', '7.291123, 125.668512', '7.289612, 125.668116', '7.289734, 125.668899', '7.290080, 125.668830', '7.290309, 125.669729', '7.290271, 125.670128', '7.290301, 125.670828', '7.291330, 125.670852', '7.291793, 125.666922', '7.291916, 125.666885', '7.292363, 125.667018');
		$polyline['onmouseover'] = '(\'Barangay Cagangohan! \');';
		$this->googlemaps->add_polyline($polyline);

		$polygon2 = array(); //Sunkist
		$polygon2['points'] = array('7.286877, 125.674819', '7.286781, 125.674996', '7.286712, 125.675229', '7.286584, 125.675473', '7.286448, 125.675632', '7.284572, 125.676616', '7.289338, 125.678617', '7.289348, 125.675876', '7.286877, 125.674819');
		$polygon2['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon2['onmouseover'] = 'this.setOptions({fillColor: "#f56c1a", strokeWeight: "1"});'
			. ' polygon_0.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Sunkist");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.287914, 125.676631));';
=======
		$polygon2['onmouseover'] = 'this.setOptions({fillColor: "#f56c1a", strokeWeight: "0.5"});'
			. ' polygon_0.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Sunkist");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.287914, 125.676631));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon2['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$this->googlemaps->add_polygon($polygon2);

		$polygon3 = array(); //prk Mansanas
		$polygon3['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon3['onmouseover'] = 'this.setOptions({fillColor: "#71f11c", strokeWeight: "2"});'
			. ' polygon_1.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Mansanas");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.284218, 125.677605));';
=======
		$polygon3['onmouseover'] = 'this.setOptions({fillColor: "#71f11c", strokeWeight: "0.5"});'
			. ' polygon_1.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Mansanas");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.284218, 125.677605));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon3['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon3['points'] = array('7.284455, 125.676637', '7.283266, 125.677008', '7.282947, 125.677163', '7.282439, 125.677734', '7.282319, 125.678131', '7.285091, 125.678577', '7.284876, 125.679395', '7.284804, 125.679400', '7.285275, 125.679408', '7.285959, 125.677292', '7.284455, 125.676637');
		$this->googlemaps->add_polygon($polygon3);

		$polygon4 = array(); //prk lanzones
		$polygon4['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon4['onmouseover'] = 'this.setOptions({fillColor: "blue", strokeWeight: "2"});'
			. ' polygon_2.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Lanzones");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.289198, 125.667392));';
=======
		$polygon4['onmouseover'] = 'this.setOptions({fillColor: "blue", strokeWeight: "0.5"});'
			. ' polygon_2.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Lanzones");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.289198, 125.667392));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon4['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon4['points'] = array('7.288149, 125.669822', '7.287217, 125.669796', '7.287196, 125.665787', '7.288962, 125.666312', '7.288718, 125.667889', '7.288672, 125.667813', '7.290819, 125.667825', '7.291123, 125.668512', '7.289612, 125.668116', '7.289694, 125.668921', '7.290085, 125.668830', '7.290322, 125.669795', '7.290311, 125.670120', '7.289385, 125.670077', '7.289377, 125.669943', '7.288149, 125.669822');
		$this->googlemaps->add_polygon($polygon4);

		$polygon5 = array(); //prk tambis
		$polygon5['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon5['onmouseover'] = 'this.setOptions({fillColor: "#f51a29", strokeWeight: "2"});'
			. ' polygon_3.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Tambis");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.288219, 125.674194));';
=======
		$polygon5['onmouseover'] = 'this.setOptions({fillColor: "#f51a29", strokeWeight: "0.5"});'
			. ' polygon_3.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Tambis");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.288219, 125.674194));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon5['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon5['points'] = array('7.288212, 125.669896', '7.287430, 125.673277', '7.286922, 125.674677', '7.289811, 125.675927', '7.290077, 125.675243', '7.289324, 125.674897', '7.289319, 125.673656', '7.289079, 125.673613', '7.289345, 125.669971', '7.288212, 125.669896');
		$this->googlemaps->add_polygon($polygon5);

		$polygon6 = array(); //prk mangosteen
		$polygon6['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon6['onmouseover'] = 'this.setOptions({fillColor: "#09d849", strokeWeight: "2"});'
			. ' polygon_4.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Mangosteen");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.291752, 125.669172));';
=======
		$polygon6['onmouseover'] = 'this.setOptions({fillColor: "#09d849", strokeWeight: "0.5"});'
			. ' polygon_4.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Mangosteen");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.291752, 125.669172));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon6['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon6['points'] = array('7.292363, 125.667018', '7.291916, 125.671186', '7.291389, 125.671178', '7.291330, 125.670852', '7.291793, 125.666922', '7.291916, 125.666885', '7.292363, 125.667018');
		$this->googlemaps->add_polygon($polygon6);

		$polygon7 = array(); //prk macopa
		$polygon7['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon7['onmouseover'] = 'this.setOptions({fillColor: "#09d8c2", strokeWeight: "2"});'
			. ' polygon_5.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Macopa");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.275576, 125.682390));';
=======
		$polygon7['onmouseover'] = 'this.setOptions({fillColor: "#09d8c2", strokeWeight: "0.5"});'
			. ' polygon_5.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Macopa");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.275576, 125.682390));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon7['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon7['points'] = array('7.275314, 125.680040', '7.275203, 125.680053', '7.275123, 125.680233', '7.275059, 125.680520', '7.274934, 125.681021', '7.274578, 125.681947', '7.274365, 125.682403', '7.274221, 125.683519', '7.275065, 125.684253', '7.275768, 125.684945', '7.276890, 125.681727', '7.276012, 125.681249', '7.275690, 125.680903', '7.275519, 125.680488', '7.275373, 125.680252', '7.275304, 125.680040');
		$this->googlemaps->add_polygon($polygon7);

		$polygon8 = array(); //prk chico
		$polygon8['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon8['onmouseover'] = 'this.setOptions({fillColor: "#8c0fb5", strokeWeight: "2"});'
			. ' polygon_6.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Chico");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.289709, 125.670953));';
=======
		$polygon8['onmouseover'] = 'this.setOptions({fillColor: "#8c0fb5", strokeWeight: "0.5"});'
			. ' polygon_6.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Chico");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.289709, 125.670953));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon8['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon8['points'] = array('7.291389, 125.671178', '7.291330, 125.670852', '7.290301, 125.670828', '7.290311, 125.670120', '7.289385, 125.670077', '7.289287, 125.671805', '7.291288, 125.671977', '7.291389, 125.671178');
		$this->googlemaps->add_polygon($polygon8);

		$polygon9 = array(); //prk avocado
		$polygon9['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon9['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "2"});'
			. ' polygon_7.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Avocado");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.291220, 125.677198));';
=======
		$polygon9['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "0.5"});'
			. ' polygon_7.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Avocado");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.291220, 125.677198));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon9['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon9['points'] = array('7.289379, 125.676738', '7.289400, 125.675904', '7.292840, 125.677355', '7.292776, 125.678165', '7.289379, 125.676738');
		$this->googlemaps->add_polygon($polygon9);

		$polygon10 = array(); //prk kaimito
		$polygon10['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon10['onmouseover'] = 'this.setOptions({fillColor: "#15d7cc", strokeWeight: "2"});'
			. ' polygon_8.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Kaimito");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.290199, 125.674387));';
=======
		$polygon10['onmouseover'] = 'this.setOptions({fillColor: "#15d7cc", strokeWeight: "0.5"});'
			. ' polygon_8.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Kaimito");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.290199, 125.674387));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon10['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon10['points'] = array('7.292817, 125.677185', '7.289811, 125.675927', '7.290077, 125.675243', '7.289324, 125.674897', '7.289319, 125.673656', '7.289079, 125.673613', '7.289287, 125.671805', '7.291288, 125.671977', '7.291389, 125.671178', '7.291916, 125.671186', '7.292022, 125.673777', '7.291532, 125.675864', '7.292884, 125.676464');
		$this->googlemaps->add_polygon($polygon10);

		$polygon11 = array(); //prk pomelo
		$polygon11['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon11['onmouseover'] = 'this.setOptions({fillColor: "#fe7f02", strokeWeight: "2"});'
			. ' polygon_9.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Pomelo");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.290688, 125.678335));';
=======
		$polygon11['onmouseover'] = 'this.setOptions({fillColor: "#fe7f02", strokeWeight: "0.5"});'
			. ' polygon_9.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Pomelo");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.290688, 125.678335));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon11['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon11['points'] = array('7.289379, 125.676738', '7.289306, 125.678605', '7.291592, 125.679562', '7.292156, 125.677977', '7.289379, 125.676738');
		$this->googlemaps->add_polygon($polygon11);

		$polygon12 = array(); //prk atis
		$polygon12['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon12['onmouseover'] = 'this.setOptions({fillColor: "#fe02c0", strokeWeight: "2"});'
			. ' polygon_10.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Atis");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.292284, 125.678979));';
=======
		$polygon12['onmouseover'] = 'this.setOptions({fillColor: "#fe02c0", strokeWeight: "0.5"});'
			. ' polygon_10.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Atis");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.292284, 125.678979));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon12['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon12['points'] = array('7.292778, 125.678237', '7.292510, 125.681394', '7.291156, 125.680874', '7.292177, 125.677985', '7.292778, 125.678237');
		$this->googlemaps->add_polygon($polygon12);

		$polygon13 = array(); //prk rambutan
		$polygon13['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon13['onmouseover'] = 'this.setOptions({fillColor: "#fed202", strokeWeight: "2"});'
			. ' polygon_11.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Rambutan");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.291618, 125.681738));';
=======
		$polygon13['onmouseover'] = 'this.setOptions({fillColor: "#fed202", strokeWeight: "0.5"});'
			. ' polygon_11.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Rambutan");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.291618, 125.681738));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon13['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon13['points'] = array('7.290847, 125.681829', '7.291209, 125.680984', '7.292446, 125.681448', '7.292241, 125.682438', '7.290858, 125.681834', '7.290847, 125.681829');
		$this->googlemaps->add_polygon($polygon13);

		$polygon14 = array(); //prk melon
		$polygon14['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon14['onmouseover'] = 'this.setOptions({fillColor: "#e3fe02", strokeWeight: "2"});'
			. ' polygon_12.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Melon");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.291618, 125.683047));';
=======
		$polygon14['onmouseover'] = 'this.setOptions({fillColor: "#e3fe02", strokeWeight: "0.5"});'
			. ' polygon_12.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Melon");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.291618, 125.683047));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon14['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon14['points'] = array('7.292268, 125.682542', '7.290834, 125.681898', '7.290491, 125.682858', '7.291353, 125.682880', '7.291581, 125.684210', '7.291964, 125.684173', '7.292268, 125.682542');
		$this->googlemaps->add_polygon($polygon14);

		$polygon15 = array(); //prk santol
		$polygon15['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon15['onmouseover'] = 'this.setOptions({fillColor: "orange", strokeWeight: "2"});'
			. ' polygon_13.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Santol");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.284324, 125.687948));';
=======
		$polygon15['onmouseover'] = 'this.setOptions({fillColor: "orange", strokeWeight: "0.5"});'
			. ' polygon_13.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Santol");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.284324, 125.687948));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon15['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon15['points'] = array('7.283940, 125.687737', '7.283488, 125.687477', '7.283009, 125.687579', '7.282968, 125.688141', '7.282064, 125.689515', '7.284466, 125.690793', '7.285575, 125.688420', '7.285686, 125.688008', '7.283868, 125.688832');
		$this->googlemaps->add_polygon($polygon15);

		$polygon16 = array(); //prk sereguellas
		$polygon16['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon16['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "2"});'
			. ' polygon_14.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Sereguellas");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.290752, 125.683571));';
=======
		$polygon16['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "0.5"});'
			. ' polygon_14.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Sereguellas");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.290752, 125.683571));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon16['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon16['points'] = array('7.291964, 125.684173', '7.291581, 125.684210', '7.291353, 125.682880', '7.290491, 125.682858', '7.288678, 125.682802', '7.290319, 125.685536', '7.291916, 125.684653');
		$this->googlemaps->add_polygon($polygon16);

		$polygon17 = array(); //prk fish pond
		$polygon17['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon17['onmouseover'] = 'this.setOptions({fillColor: "blue", strokeWeight: "2"});'
			. ' polygon_15.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Fish Pond/Sea Wall");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.291752, 125.692046));';
=======
		$polygon17['onmouseover'] = 'this.setOptions({fillColor: "blue", strokeWeight: "0.5"});'
			. ' polygon_15.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Fish Pond/Sea Wall");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.291752, 125.692046));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon17['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon17['points'] = array('7.284466, 125.690793', '7.285613, 125.688408', '7.286145, 125.688161', '7.286486, 125.688241', '7.286693, 125.688944', '7.286534, 125.689127', '7.287410, 125.689317', '7.288368, 125.689048', '7.289226, 125.689035', '7.290507, 125.687975', '7.290787, 125.688089', '7.290319, 125.685536', '7.290787, 125.688089', '7.292937, 125.689033', '7.294427, 125.689951', '7.296428, 125.691737', '7.295853, 125.692123', '7.295300, 125.692273', '7.293703, 125.694247', '7.294001, 125.694612', '7.294172, 125.697123', '7.291000, 125.698678', '7.289723, 125.697091', '7.287808, 125.695717', '7.285573, 125.691866', '7.284466, 125.690793', '7.282657, 125.689763', '7.279996, 125.688411');
		$this->googlemaps->add_polygon($polygon17);

		$polygon18 = array(); //prk ubas
		$polygon18['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon18['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "2"});'
			. ' polygon_16.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Ubas");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.286963, 125.678549));';
=======
		$polygon18['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "0.5"});'
			. ' polygon_16.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Ubas");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.286963, 125.678549));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon18['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon18['points'] = array('7.289310, 125.678681', '7.289278, 125.679735', '7.287565, 125.680247', '7.285363, 125.679422', '7.285275, 125.679408', '7.285959, 125.677292', '7.289310, 125.678681');
		$this->googlemaps->add_polygon($polygon18);

		$polygon19 = array(); //prk bayabas
		$polygon19['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon19['onmouseover'] = 'this.setOptions({fillColor: "violet", strokeWeight: "2"});'
			. ' polygon_17.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Bayabas");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.289901, 125.681103));';
=======
		$polygon19['onmouseover'] = 'this.setOptions({fillColor: "violet", strokeWeight: "0.5"});'
			. ' polygon_17.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Bayabas");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.289901, 125.681103));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon19['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon19['points'] = array('7.289095, 125.681504', '7.288678, 125.682802', '7.290491, 125.682858', '7.291156, 125.680874', '7.289278, 125.679735', '7.287565, 125.680247', '7.287558, 125.681054');
		$this->googlemaps->add_polygon($polygon19);

		$polygon20 = array(); //prk kasoy
		$polygon20['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon20['onmouseover'] = 'this.setOptions({fillColor: "#15d7cc", strokeWeight: "2"});'
			. ' polygon_18.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Kasoy");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.290603, 125.679730));';
=======
		$polygon20['onmouseover'] = 'this.setOptions({fillColor: "#15d7cc", strokeWeight: "0.5"});'
			. ' polygon_18.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Kasoy");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.290603, 125.679730));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon20['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon20['points'] = array('7.291575, 125.679636', '7.291156, 125.680874', '7.289278, 125.679735', '7.289310, 125.678681');
		$this->googlemaps->add_polygon($polygon20);

		$polygon21 = array(); //prk boongon
		$polygon21['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon21['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "2"});'
			. ' polygon_19.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Boongon");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.281515, 125.685716));';
=======
		$polygon21['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "0.5"});'
			. ' polygon_19.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Boongon");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.281515, 125.685716));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon21['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon21['points'] = array('7.284079, 125.683373', '7.284057, 125.684456', '7.282543, 125.684363', '7.282149, 125.689615', '7.279839, 125.688108', '7.278502, 125.687332', '7.280543, 125.683911', '7.281906, 125.684834', '7.282491, 125.684008', '7.281536, 125.683327', '7.284079, 125.683373');
		$this->googlemaps->add_polygon($polygon21);

		$polygon22 = array(); //prk durian
		$polygon22['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon22['onmouseover'] = 'this.setOptions({fillColor: "violet", strokeWeight: "2"});'
			. ' polygon_20.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Durian");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.283260, 125.686038));';
=======
		$polygon22['onmouseover'] = 'this.setOptions({fillColor: "violet", strokeWeight: "0.5"});'
			. ' polygon_20.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Durian");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.283260, 125.686038));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon22['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon22['points'] = array('7.285019, 125.684404', '7.283488, 125.687477', '7.283009, 125.687579', '7.282968, 125.688141', '7.282064, 125.689515', '7.282543, 125.684363');
		$this->googlemaps->add_polygon($polygon22);

		$polygon23 = array(); //prk mangga
		$polygon23['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon23['onmouseover'] = 'this.setOptions({fillColor: "green", strokeWeight: "2"});'
			. ' polygon_21.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Mangga");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.279024, 125.678035));';
=======
		$polygon23['onmouseover'] = 'this.setOptions({fillColor: "green", strokeWeight: "0.5"});'
			. ' polygon_21.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Mangga");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.279024, 125.678035));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon23['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon23['points'] = array('7.286714, 125.674719', '7.286437, 125.675513', '7.284479, 125.676564', '7.282989, 125.676972', '7.282989, 125.676972', '7.281050, 125.679919', '7.283551, 125.681432', '7.280374, 125.680914', '7.279863, 125.681638', '7.281523, 125.682754', '7.280631, 125.683673', '7.278502, 125.687332', '7.275768, 125.684945', '7.276890, 125.681727', '7.276012, 125.681249', '7.275690, 125.680903', '7.275519, 125.680488', '7.275373, 125.680252', '7.275314, 125.680040', '7.275326, 125.679912', '7.275841, 125.674060', '7.280226, 125.674532', '7.280258, 125.672065', '7.286714, 125.674719');
		$this->googlemaps->add_polygon($polygon23);

		$polygon24 = array(); //prk mabolo
		$polygon24['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon24['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "2"});'
			. ' polygon_22.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Mabolo");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.282345, 125.679322));';
=======
		$polygon24['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "0.5"});'
			. ' polygon_22.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Mabolo");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.282345, 125.679322));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon24['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon24['points'] = array('7.282997, 125.678267', '7.283051, 125.679844', '7.282093, 125.680584', '7.281050, 125.679919', '7.282173, 125.678307', '7.282316, 125.678082', '7.282997, 125.678267');
		$this->googlemaps->add_polygon($polygon24);

		$polygon25 = array(); //prk lomboy
		$polygon25['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon25['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "2"});'
			. ' polygon_23.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Lomboy");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.281238, 125.681768));';
=======
		$polygon25['onmouseover'] = 'this.setOptions({fillColor: "#d7154c", strokeWeight: "0.5"});'
			. ' polygon_23.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Lomboy");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.281238, 125.681768));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon25['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon25['points'] = array('7.280374, 125.680914', '7.283551, 125.681432', '7.284051, 125.683406', '7.281327, 125.683264', '7.281523, 125.682754', '7.279863, 125.681638', '7.280342, 125.680914');
		$this->googlemaps->add_polygon($polygon25);

		$polygon26 = array(); //prk Guyabano
		$polygon26['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon26['onmouseover'] = 'this.setOptions({fillColor: "blue", strokeWeight: "2"});'
			. ' polygon_24.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Guyabano");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.285218, 125.682240));';
=======
		$polygon26['onmouseover'] = 'this.setOptions({fillColor: "blue", strokeWeight: "0.5"});'
			. ' polygon_24.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Guyabano");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.285218, 125.682240));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon26['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon26['points'] = array('7.287669, 125.683073', '7.286084, 125.683127', '7.286009, 125.683953', '7.285073, 125.683975', '7.285019, 125.684404', '7.284057, 125.684456', '7.284051, 125.683406', '7.283551, 125.681432', '7.282093, 125.680584', '7.283051, 125.679844', '7.282997, 125.678267', '7.285091, 125.678577', '7.284876, 125.679395', '7.285275, 125.679408', '7.287565, 125.680247');
		$this->googlemaps->add_polygon($polygon26);

		$polygon27 = array(); //prk marang joesil
		$polygon27['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon27['onmouseover'] = 'this.setOptions({fillColor: "#09d8c2", strokeWeight: "2"});'
			. ' polygon_25.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Marang Joesil");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.281642, 125.683828));';
=======
		$polygon27['onmouseover'] = 'this.setOptions({fillColor: "#09d8c2", strokeWeight: "0.5"});'
			. ' polygon_25.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Marang Joesil");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.281642, 125.683828));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon27['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon27['points'] = array('7.281523, 125.682754', '7.281327, 125.683264', '7.282491, 125.684008', '7.281906, 125.684834', '7.280543, 125.683911');
		$this->googlemaps->add_polygon($polygon27);

		$polygon28 = array(); //prk Marang
		$polygon28['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon28['onmouseover'] = 'this.setOptions({fillColor: "yellow", strokeWeight: "2"});'
			. ' polygon_26.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Marang");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.287410, 125.684150));';
=======
		$polygon28['onmouseover'] = 'this.setOptions({fillColor: "yellow", strokeWeight: "0.5"});'
			. ' polygon_26.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Marang");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.287410, 125.684150));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon28['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon28['points'] = array('7.288233, 125.683835', '7.285924, 125.685562', '7.286818, 125.686432', '7.285686, 125.688008', '7.283868, 125.688832', '7.283940, 125.687737', '7.283488, 125.687477', '7.285019, 125.684404', '7.285073, 125.683975', '7.285019, 125.684404', '7.285073, 125.683975', '7.286009, 125.683953', '7.286084, 125.683127', '7.287669, 125.683073');
		$this->googlemaps->add_polygon($polygon28);

		$polygon29 = array(); //prk Nangka
		$polygon29['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon29['onmouseover'] = 'this.setOptions({fillColor: "#71f11c", strokeWeight: "2"});'
			. ' polygon_27.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Purok Nangka");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.289305, 125.686596));';
=======
		$polygon29['onmouseover'] = 'this.setOptions({fillColor: "#71f11c", strokeWeight: "0.5"});'
			. ' polygon_27.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Purok Nangka");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.289305, 125.686596));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon29['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon29['points'] = array('7.290319, 125.685536', '7.290787, 125.688089', '7.290507, 125.687975', '7.289226, 125.689035', '7.288368, 125.689048', '7.287410, 125.689317', '7.286534, 125.689127', '7.286693, 125.688944', '7.286486, 125.688241', '7.286145, 125.688161', '7.285613, 125.688408', '7.285686, 125.688008', '7.286818, 125.686432', '7.285924, 125.685562', '7.288233, 125.683835', '7.287669, 125.683073', '7.287558, 125.681054', '7.289095, 125.681504', '7.288678, 125.682802');
		$this->googlemaps->add_polygon($polygon29);

		$polygon30 = array(); //prk Fish Cage
		$polygon30['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon30['strokeColor'] = 'green';
		$polygon30['onmouseover'] = 'this.setOptions({fillColor: "green", strokeWeight: "2",strokeColor:"green",fillOpacity:"0.1"});'
			. ' polygon_28.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Fish Cage Boundary");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.283721, 125.700513));';
=======
		$polygon30['onmouseover'] = 'this.setOptions({fillColor: "green", strokeWeight: "1.5",strokeColor:"green",fillOpacity:"0.1"});'
			. ' polygon_28.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Fish Cage Boundary");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.283721, 125.700513));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon30['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon30['points'] = array('7.287623, 125.708676', '7.286325, 125.705243', '7.282643, 125.704921', '7.281089, 125.704513', '7.279897, 125.701616', '7.276321, 125.697969', '7.280833, 125.694128', '7.285239, 125.696209', '7.287495, 125.699406', '7.288049, 125.701659', '7.289603, 125.701359', '7.287623, 125.708676');
		//$polygon30['onmouseover'] = 'alert(\'Fish Boundaries!\' );';
		$this->googlemaps->add_polygon($polygon30);

		$polyline3 = array(); //prk Fish Sanctuary
<<<<<<< HEAD
		$polyline3['strokeColor'] = 'blue';
=======
		$polyline3['strokeColor'] = 'Blue';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polyline3['points'] = array('7.279734, 125.707408', '7.264195, 125.707280', '7.265089, 125.719983', '7.280415, 125.718352', '7.279734, 125.707408');
		$this->googlemaps->add_polyline($polyline3);

		$polygon31 = array(); //Fish Sanctuary
		$polygon31['fillColor'] = 'transparent';
<<<<<<< HEAD
		$polygon31['strokeColor'] = 'blue';
		$polygon31['onmouseover'] = 'this.setOptions({fillColor: "blue", strokeWeight: "2",strokeColor:"blue",fillOpacity:"0.1"});'
			. ' polygon_29.infoWindow = new google.maps.InfoWindow();
		this.infoWindow.setContent("Fish Sanctuary");
		this.infoWindow.open(map);
		this.infoWindow.setPosition(new google.maps.LatLng(7.275995, 125.711585));';
=======
		$polygon31['onmouseover'] = 'this.setOptions({fillColor: "green", strokeWeight: "1.5",strokeColor:"green",fillOpacity:"0.1"});'
			. ' polygon_29.infoWindow = new google.maps.InfoWindow();
                    this.infoWindow.setContent("Fish Sanctuary");
                    this.infoWindow.open(map);
                    this.infoWindow.setPosition(new google.maps.LatLng(7.275995, 125.711585));';
>>>>>>> bab0d9c06b21417e4ada15740958a5955c859021
		$polygon31['onmouseout'] = 'this.setOptions({fillColor: "transparent"});'
			. 'this.infoWindow.close();';
		$polygon31['points'] = array('7.279734, 125.707408', '7.264195, 125.707280', '7.265089, 125.719983', '7.280415, 125.718352', '7.279734, 125.707408');
		$this->googlemaps->add_polygon($polygon31);

		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('Frontend/map_content', $data);
	}

}
