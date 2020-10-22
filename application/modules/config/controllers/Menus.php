<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Menus extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Mmenus');		
	}

	public function index()
	{
		$data['title']	= 'Menu & Submenu';
		$view			= $this->load->view('config/menus/index',$data);
		return $view;
	}	

	public function data($arg,$id,$parent=NULL)
	{
		# code...
		$data = array();
		if ($arg == 'menus') {
			# code...
			$get_data 	= $this->Stores->getWhere('config_menus',array('AND'=>array('id_parent'=>0,'status <>' => 4)),'sort_number ASC')->result_array();
			$index 	= 0;
			foreach ($get_data as $key) {
				# code...
				$sort = $index + 1;
				$children   = $this->Stores->getWhere('config_menus',array('AND'=>array('id_parent' => $key['id'],'status <>'=> 4)),'sort_number ASC')->result_array();
				$isHasChild = ($children !=  array()) ? 1  :  0 ;

				$data[$index]['id']      = (int)$key['id'];				
				$data[$index]['content'] = $this->icon_template($key['icon']).$key['name'].$this->button_template($key['status'],$isHasChild,$key['id'],$key['url']);				
				if ($children != array()) 
				{
					# code...
					$index1 = 0;
					foreach ($children as $key2) 
					{
						# code...
						$sort1 = $index1 + 1;
						$children2   = $this->Stores->getWhere('config_menus',array('AND'=>array('id_parent' => $key2['id'],'status <>'=> 4)),'sort_number ASC')->result_array();
						$isHasChild2 = ($children2 !=  array()) ? 1  :  0 ;

						$data[$index]['children'][$index1]['id']       = (int)$key2['id'];				
						$data[$index]['children'][$index1]['content']  = $this->icon_template($key2['icon']).$key2['name'].$this->button_template($key2['status'],$isHasChild2,$key2['id'],$key2['url']);

						$index2    = 0;						
						foreach ($children2 as $key3) 
						{
							# code...
							$sort2 = $index2 + 1;	
							$children3   = $this->Stores->getWhere('config_menus',array('AND'=>array('id_parent' => $key3['id'],'status <>'=> 4)),'sort_number ASC')->result_array();
							$isHasChild3 = ($children3 !=  array()) ? 1  :  0 ;

							$data[$index]['children'][$index1]
										['children'][$index2]['id'] 		= $key3['id'];

							$data[$index]['children'][$index1]
										['children'][$index2]['content'] 	= $this->icon_template($key3['icon']).$key3['name'].$this->button_template($key3['status'],$isHasChild3,$key3['id'],$key3['url']);

							$index3 = 0;							
							foreach ($children3 as $key4) 
							{
								# code...
								$sort3 = $index3 + 1;
								$data[$index]['children'][$index1]
											['children'][$index2]
											['children'][$index3]['id'] 	 = $key4['id'];
					
								$data[$index]['children'][$index1]
											['children'][$index2]
											['children'][$index3]['content'] = $this->icon_template($key4['icon']).$key4['name'].$this->button_template($key4['status'],0,$key4['id'],$key4['url']);
								$index3++;
							}
							$index2++;
						}
						$index1++;	
					}
				}
				$index++;
			}					
		}
		elseif ($arg == 'select') {
			# code...
			$data = [
				[
					'name'   => 'f_parent',
					'detail' => $this->Mmenus->Menus()->result_array()					
				]
			];			
		}
		else
		{
			$data['list'] = $this->Stores->getWhere('config_menus',array('AND'=>array('id'=>$id)))->result_array();			
		}

		echo json_encode($data);		
	}

	public function button_template($status,$isHasChild,$id,$url)
	{
		# code...
		$_status       = ($status == 1) ? "'off'": "'on'" ;
		$_status_color = ($status == 1) ? "orange": "green" ;
		$_delete       = "'delete'";
		$_edit         = "'edit'";		

		$btn_delete = '';
		if ($isHasChild == 0) {
			# code...
			$btn_delete =  	'<button class="btn-floating button-delete waves-effect waves-light orange darken-4 left" type="submit" onclick="openForm('.$_delete.','.$id.',0)" name="action">
								<i class="material-icons left">delete</i>
							</button>';			
		}

		$url = ($url != '#') ? base_url().$url : '' ;

		return 	'	</span>
					<span class="right" style="width: 58%;overflow-wrap: break-word;text-align: right;" >
						'.$url.'					
					</span>
				</div>
				<div class="dd-btn-group">
					'.$btn_delete.'				
					<button class="btn-floating button-status waves-effect waves-light '.$_status_color.' darken-4 left" type="submit" onclick="openForm('.$_status.','.$id.',0)" name="action">
						<i class="material-icons left">power_settings_new</i>
					</button>
					<button class="btn-floating button-edit waves-effect waves-light lime accent-3 left" type="submit" onclick="openForm('.$_edit.','.$id.',0)" name="action">
						<i class="material-icons left">edit</i>
					</button>				
				</div>';		
	}
	
	public function icon_template($value)
	{
		# code...
		return '<i class="material-icons">'.$value.'</i>';
	}	
	
	public function store()
	{
		# code...
		$text_status = '';
		$res_data	  = '';
		$requestData = $this->Globals->requestData();		
		$data_sender = array
		(
			'name' 			=> $requestData['f_name'],
			'url' 			=> $requestData['f_route'],
			'icon' 			=> $requestData['f_icon'],
			'id_parent' 	=> $requestData['f_parent'],
			'sort_number' 	=> $requestData['f_sort_number'],			
			'crud' 			=> $requestData['crud'],
			'json'			=> $requestData['f_json'],
			'oid'			=> $requestData['oid'], 
		);
		
		$data_store 				= $this->Globals->logStore($data_sender['crud']);
		$data_store['name'] 	 	= $data_sender['name'];
		$data_store['url'] 		 	= $data_sender['url'];
		$data_store['icon'] 	 	= $data_sender['icon'];
		$data_store['id_parent'] 	= $data_sender['id_parent'];
		$data_store['sort_number'] 	= $data_sender['sort_number'];		

		if ($data_sender['crud'] == 'insert') 
		{
			# code...
			$data_store['status'] 	 	= 1;						
			$res_data				 	= $this->Stores->insert('config_menus',$data_store);
			$text_status			 	= $this->Stores->status($res_data,'Data berhasil ditambahkan.');			
		}
		elseif ($data_sender['crud'] == 'update') {
			# code...			
			$res_data				 = $this->Stores->update('config_menus',$data_store,array('id' => $data_sender['oid']));
			$text_status			 = $this->Stores->status($res_data,'Data berhasil diubah.');			
		}
		elseif ($data_sender['crud'] == 'on') {
			# code...
			$data_store['status'] 	= 1;
			$res_data				= $this->Stores->update('config_menus',$data_store,array('id' => $data_sender['oid']));
			$text_status			= $this->Stores->status($res_data,'Data berhasil diubah.');			
		}
		elseif ($data_sender['crud'] == 'off') {
			# code...
			$data_store['status'] 	= 0;
			$res_data				= $this->Stores->update('config_menus',$data_store,array('id' => $data_sender['oid']));
			$text_status			= $this->Stores->status($res_data,'Data berhasil diubah.');			
		}
		elseif ($data_sender['crud'] == 'change_all') {
			# code...
			$data_store['status']  = 0;
			$data_json             = json_decode($data_sender['json']);
			$res_data              = 0;
		}						
		elseif ($data_sender['crud'] == 'delete') {
			# code...
			$data_store['status'] 	= 4;
			$res_data				= $this->Stores->update('config_menus',$data_store,array('id' => $data_sender['oid']));			
			$text_status		= $this->Stores->status($res_data,'Data berhasil dihapus.');			
		}
		
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}	
}
