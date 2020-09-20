<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Core extends CI_Controller {

	public function __construct () {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function aside()
	{
		# code...
		$data 	= $this->Stores->getWhere('config_menus',array('AND'=>array('status'=>1,'id_parent'=>0)),'sort_number ASC')->result_array();		
		$index 	= 0;
		foreach ($data as $key) {
			# code...
			$child	   				= $this->Stores->getWhere('config_menus',array('AND'=>array('status' => 1,'id_parent' => $key['id'])),'sort_number ASC')->result_array();			
			$rules	   				= $this->Stores->getWhere('config_permissions',array('AND'=>array('id_groups' => $this->session->userdata('sesRole'),'id_menus' => $key['id'])))->result_array();
			$data[$index]['rules'] 	= $rules;
			$data[$index]['child'] 	= $child;			
			if ($data[$index]['child'] != array()) {
				# code...
				$index1 = 0;
				foreach ($child as $key2) {
					# code...
					$child2   				= $this->Stores->getWhere('config_menus',array('AND' => array('status' => 1,'id_parent' => $key2['id'])),'sort_number ASC')->result_array();
					$rules2	   				= $this->Stores->getWhere('config_permissions',array('AND'=>array('id_groups' => $this->session->userdata('sesRole'),'id_menus' => $key2['id'])))->result_array();					

					$data[$index]['child']
						[$index1]['rules'] 	= $rules2;
					$data[$index]['child']
						[$index1]['child'] 	= $child2;					
					$index2 = 0;
					if ($child2 != array()) {
						# code...
						foreach ($child2 as $key3) {
							# code...
							$child3   				= $this->Stores->getWhere('config_menus',array('AND'=>array('status'=>1,'id_parent' => $key3['id'])),'sort_number ASC')->result_array();
							$rules3	   				= $this->Stores->getWhere('config_permissions',array('AND'=>array('id_groups' => $this->session->userdata('sesRole'),'id_menus' => $key3['id'])))->result_array();

							$data[$index]['child']
								[$index1]['child']
								[$index2]['rules'] 	= $rules3;

							$data[$index]['child']
								[$index1]['child']
								[$index2]['child'] 	= $child3;					


							$index3 = 0;
							if ($child3 != array()) {
								# code...
								foreach ($child3 as $key4) {
									# code...
									$child4 				= $this->Stores->getWhere('config_menus',array('AND'=>array('status' => 1,'id_parent' => $key4['id'])),'sort_number ASC')->result_array();
									$rules4	   				= $this->Stores->getWhere('config_permissions',array('AND'=>array('id_groups' => $this->session->userdata('sesRole'),'id_menus' => $key4['id'])))->result_array();

									$data[$index]['child']
										[$index1]['child']
										[$index2]['child']
										[$index3]['rules'] 	= $rules4;

									$data[$index]['child']
										[$index1]['child']
										[$index2]['child']
										[$index3]['child'] 	= $child4;					
									$index3++;
								}													
							}							
							$index2++;		

						}						
                    }					
					$index1++;
				}
			}
			$index++;
		}
		echo json_encode($data);
	}

	public function not_found()
	{
		# code...
		$data['title']	= 'Menu & Submenu';
		$view			= $this->load->view('core/404/index',$data);
		return $view;		
	}

	public function session_check()
	{
		# code...
		$res = ($this->session->userdata('login') == "") ? 0 : 1 ;
		echo json_encode($res);
	}

	public function privileged()
	{
		# code...
		$res_status  = '';
		$res_data    = '';
		$requestData = $this->Globals->requestData();
		$data 	= $this->Stores->getWhere('config_menus',array('AND'=>array('status'=>1,'url'=>$requestData['route'])))->result_array();
		if ($data != array()) {
			# code...
			$rules = $this->Stores->getWhere('config_permissions',array('AND'=>array('id_groups' => $this->session->userdata('sesRole'),'id_menus' => $data[0]['id'])))->result_array();			
			if ($rules != array()) {
				# code...
				$res_data = $rules[0];
				$res_status = true;				
			} else {
				# code...
				$res_status = false;
				$res_data   = [];				
			}
		}
		else
		{
			$res_status = false;
			$res_data   = [];
		}

		$res = array
					(
						'status' => $res_status,
						'value'   => $res_data
					);
		echo json_encode($res);		

	}

	public function notify()
	{
		# code...
		$res_status  = '';
		$data    = [];
		$rules = $this->Stores->getWhere('config_permissions',array('AND'=>array('id_groups' => $this->session->userdata('sesRole'),'notify' => 1)))->result_array();
		if ($rules != array()) {
			# code...
			$index = 0;
			foreach ($rules as $key) {
				# code...
				$menu = $this->Stores->getWhere('config_menus',array('AND'=>array('status' => 1,'id' => $key['id_menus'])))->result_array();
				if ($menu != array()) {
					# code...
					// switch ($menu[0]['id']) {
					// 	case '17':
					// 		# code...
					// 		// Pegawai
					// 		$data[$index]['component']['counter'] = $this->Stores->getWhere('mr_pegawai',array('AND'=>array('status' => 0)))->num_rows();
					// 		$data[$index]['component']['name'] = $menu[0]['name'];
					// 		$data[$index]['component']['route'] = $menu[0]['url'];							
					// 		$data[$index]['component']['text'] = "perlu diverifikasi";
					// 		$data[$index]['component']['icon'] = "stars";						
					// 		$index++;
							
					// 		$getData = $this->Stores->getWhere('mr_struktur_organisasi',array('AND'=>array('status' => 0)))->num_rows();
					// 		if ($getData != 0) {
					// 			# code...
					// 			$data[$index]['component']['counter'] = $getData;
					// 			$data[$index]['component']['name'] = "Strukur Organisasi di ".$menu[0]['name'];
					// 			$data[$index]['component']['route'] = $menu[0]['url'];							
					// 			$data[$index]['component']['text'] = "perlu diverifikasi";
					// 			$data[$index]['component']['icon'] = "stars";						
					// 			$index++;								
					// 		}
							
					// 		break;						
					// 	case '23':
					// 		# code...
					// 		// Komponen
					// 		$data[$index]['component']['counter'] = $this->Stores->getWhere('mr_komponen',array('AND'=>array('status' => 0)))->num_rows();
					// 		$data[$index]['component']['name'] = $menu[0]['name'];
					// 		$data[$index]['component']['route'] = $menu[0]['url'];							
					// 		$data[$index]['component']['text'] = "perlu diverifikasi";
					// 		$data[$index]['component']['icon'] = "stars";						
					// 		$index++;							
					// 		break;
					// 	case '24':
					// 		# code...
					// 		// Jabatan
					// 		$data[$index]['component']['counter'] = $this->Stores->getWhere('mr_jabatan',array('AND'=>array('status' => 0)))->num_rows();
					// 		$data[$index]['component']['name'] = $menu[0]['name'];
					// 		$data[$index]['component']['route'] = $menu[0]['url'];							
					// 		$data[$index]['component']['text'] = "perlu diverifikasi";						
					// 		$data[$index]['component']['icon'] = "stars";						
					// 		$index++;							
					// 		break;
					// 	case '45':
					// 		# code...
					// 		// Peta Jabatan
					// 		$data[$index]['component']['counter'] = $this->Stores->getWhere('mr_peta_jabatan',array('AND'=>array('status' => 0)))->num_rows();
					// 		$data[$index]['component']['name'] = $menu[0]['name'];
					// 		$data[$index]['component']['route'] = $menu[0]['url'];							
					// 		$data[$index]['component']['text'] = "perlu diverifikasi";						
					// 		$data[$index]['component']['icon'] = "stars";						
					// 		$index++;							
					// 		break;
					// 	default:
					// 		# code...
					// 		break;
					// }
	
					
				}
			}
		}

		$res = array
					(
						'value'   => $data
					);
		echo json_encode($res);		
	}
}
