<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Permissions extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title']	= 'Permissions';
		$view			= $this->load->view('config/permissions/index',$data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		$data = array();
		if ($arg == 'group') {
			# code...
			redirect('config/groups/data/table/0');
		}
		elseif ($arg == 'menus') {
			# code...
			$data['list'] 	= $this->Stores->getWhere('config_menus',array('AND'=>array('status'=>1,'id_parent'=>0)),'sort_number ASC')->result_array();		
			$index 	= 0;
			foreach ($data['list'] as $key) {
				# code...
				$check_menu 			= $this->Stores->getWhere('config_permissions',array('AND' => array('id_groups' => $id,'id_menus' => $key['id'])))->result_array();
				if ($check_menu == array()) {
					# code...
					$this->Stores->insert('config_permissions',array('id_groups' => $id,'id_menus' => $key['id']));
					$check_menu 				 = $this->Stores->getWhere('config_permissions',array('AND' => array('id_groups' => $id,'id_menus' => $key['id'])))->result_array();
				}
				
				$child                       = $this->Stores->getWhere('config_menus',array('AND' => array('status' => 1,'id_parent' => $key['id'])),'sort_number ASC')->result_array();			
				$data['list'][$index]['permissions'] = $check_menu[0];	
				$data['list'][$index]['child'] 	     = $child;
				if ($data['list'][$index]['child'] != array()) {
					# code...
					$index1 = 0;
					foreach ($child as $key2) {
						# code...
						$check_menu  = $this->Stores->getWhere('config_permissions',array('AND' => array('id_groups' => $id,'id_menus' => $key2['id'])))->result_array();
						if ($check_menu == array()) {
							# code...
							$this->Stores->insert('config_permissions',array('id_groups' => $id,'id_menus' => $key2['id']));
							$check_menu                                    = $this->Stores->getWhere('config_permissions',array('AND' => array('id_groups' => $id,'id_menus' => $key2['id'])))->result_array();						
						}

						$child2                                        = $this->Stores->getWhere('config_menus',array('AND' => array('status' => 1,'id_parent' => $key2['id'])),'sort_number ASC')->result_array();
						$data['list'][$index]['child'][$index1]['permissions'] = $check_menu[0];							
						$data['list'][$index]['child'][$index1]['child']       = $child2;					
						$index2                                        = 0;
						if ($child2 != array()) {
							# code...
							foreach ($child2 as $key3) {
								# code...
								$check_menu = $this->Stores->getWhere('config_permissions',array('AND' => array('id_groups' => $id,'id_menus' => $key3['id'])))->result_array();
								if ($check_menu == array()) {
									# code...
									$this->Stores->insert('config_permissions',array('id_groups' => $id,'id_menus' => $key3['id']));
									$check_menu                                    = $this->Stores->getWhere('config_permissions',array('AND' => array('id_groups' => $id,'id_menus' => $key3['id'])))->result_array();
								}

								$child3                                                          = $this->Stores->getWhere('config_menus',array('AND' => array('status' => 1,'id_parent' => $key3['id'])),'sort_number ASC')->result_array();
								$data['list'][$index]['child'][$index1]['child'][$index2]['permissions'] = $check_menu[0];								
								$data['list'][$index]['child'][$index1]['child'][$index2]['child']       = $child3;						
								$index3                                                          = 0;
								if ($child3 != array()) {
									# code...
									foreach ($child3 as $key4) {
										# code...
										$check_menu = $this->Stores->getWhere('config_permissions',array('AND' => array('id_groups' => $id,'id_menus' => $key4['id'])))->result_array();
										if ($check_menu == array()) {
											# code...
											$this->Stores->insert('config_permissions',array('id_groups' => $id,'id_menus' => $key4['id']));
											$check_menu                                    = $this->Stores->getWhere('config_permissions',array('AND' => array('id_groups' => $id,'id_menus' => $key4['id'])))->result_array();
										}

										$child4                                                                            = $this->Stores->getWhere('config_menus',array('AND' => array('status' => 1,'id_parent' => $key4['id'])),'sort_number ASC')->result_array();
										$data['list'][$index]['child'][$index1]['child'][$index2]['child'][$index3]['permissions'] = $check_menu[0];										
										$data['list'][$index]['child'][$index1]['child'][$index2]['child'][$index3]['child'] 	   = $child4;					
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
		}

		echo json_encode($data);		
	}
	
	public function store()
	{
		# code...
		$text_status = '';
		$res_data	  = '';
		$requestData = $this->Globals->requestData();		
		$data_sender = array
		(
			'id_menus'  => $requestData['id_menus'],
			'id_groups' => $requestData['id_groups'],
			'value'     => $requestData['value'],
			'parameter' => $requestData['parameter'],
			'crud'      => $requestData['crud'] 
		);
		
		$data_store = $this->Globals->logStore($data_sender['crud']);		
		if ($data_sender['crud'] == 'update') 
		{
			# code...
			$data_store[$data_sender['parameter']] = $data_sender['value'];		
			$res_data			= $this->Stores->update('config_permissions',$data_store,array('id_menus' => $data_sender['id_menus'],'id_groups' => $data_sender['id_groups']));
			$text_status		= $this->Stores->status($res_data,'Data berhasil diubah.');			
		}
		elseif ($data_sender['crud'] == 'update_groups') {
			# code...
			$data_store[$data_sender['parameter']] = $data_sender['value'];
			$res_data			= $this->Stores->update('config_permissions',$data_store,array('id_groups' => $data_sender['id_groups']));
			$text_status		= $this->Stores->status($res_data,'Data berhasil diubah.');						
		}
		
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}	
}
		