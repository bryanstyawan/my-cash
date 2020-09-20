<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Project_management extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_pm');		
	}

	public function index()
	{
		$data['title']	= 'Project Management';
		$view			= $this->load->view('internal/project_management/index',$data);
		return $view;
	}	

	public function data($arg,$id,$parent=NULL)
	{
		if ($arg == 'kanban') {
			# code...
			$data['list'] = $this->Stores->getWhere('il_pm_board',array('AND'=>array('status'=>1)))->result_array();
			if ($data['list']) {
				# code...
				$index = 0;
				foreach ($data['list'] as $key) {
					# code...
					$data['list'][$index]['item'] = $this->Stores->getWhere('il_pm_card',array('AND'=>array('id_pm_board' => $key['id'],'status'=>1)))->result_array();
					$index1 = 0;
					foreach ($data['list'][$index]['item'] as $item) {
						# code...						
						$getMember = $this->M_pm->get_member($item['id']);
						$getCounter = $this->Stores->getWhere('il_pm_task',array('AND'=>array('id_pm_card'=>$item['id'],'status <>'=>4)))->result_array();						
						if ($getMember != 0) {
							# code...
							$memberWrap = array();
							$indexMember = 0;
							foreach ($getMember as $member) {
								# code...
								$memberWrap[$indexMember] = $member->photo; 
								$indexMember++;
							}
							$data['list'][$index]['item'][$index1]['users'] = $memberWrap;							
						}

						$counter_progress = 0;
						$counter_done = 0;						
						if ($getCounter != array()) {
							# code...
							$total = count($getCounter);
							foreach ($getCounter as $key) {
								# code...
								($key['status'] == 2) ? $counter_done++ : '' ;
								($key['is_done'] == 1) ? $counter_progress++ : '' ;								
							}

							$counter_progress = ($counter_progress/$total)*100;
							$counter_done = ($counter_done/$total)*100;
						}

						$counter_done = round($counter_done)."%";
						$counter_progress = round($counter_progress)."%";						
						$data['list'][$index]['item'][$index1]['task_progress'] = $counter_progress;
						$data['list'][$index]['item'][$index1]['task_done']     = $counter_done;

						$index1++;
					}
					$index++;
				}
			}
		}
		elseif ($arg == 'table_member') {
			# code...
			$data['list'] = $this->M_pm->get_member($id);			
		}
		elseif ($arg == 'table_task') {
			# code...
			$data['list'] = $this->Stores->getWhere('il_pm_task',array('AND'=>array('id_pm_card'=>$id,'status <>'=>4)))->result_array();
			$index = 0;
			foreach ($data['list'] as $key) {
				# code...
				$getPIC = $this->Stores->getWhere('mr_pegawai',array('AND'=>array('nip' => $key['nip'],'status'=>1)))->result_array();
				$data['list'][$index]['pegawai_name'] = ($getPIC != array()) ? $getPIC[0]['nama'] : '' ;
				$data['list'][$index]['pegawai_image'] = ($getPIC != array()) ? $getPIC[0]['photo'] : 'avatar-7.png' ;				
				$index++;
			}
		}		
		elseif ($arg == 'table_pegawai') {
			# code...
			$data['list'] = $this->Stores->getWhere('mr_pegawai',array('AND'=>array('status'=>1)))->result_array();
		}
		elseif ($arg == 'single_task')
		{
			$data['list'] = $this->Stores->getWhere('il_pm_task',array('AND'=>array('id'=>$id)))->result_array();			
			if ($data['list'] != array()) {
				# code...
				$getPIC = $this->Stores->getWhere('mr_pegawai',array('AND'=>array('nip' => $data['list'][0]['nip'],'status'=>1)))->result_array();
				$data['list'][0]['pegawai_name'] = ($getPIC != array()) ? $getPIC[0]['nama'] : '' ;
				$data['list'][0]['pegawai_image'] = ($getPIC != array()) ? $getPIC[0]['photo'] : 'avatar-7.png' ;				
			}
		}
		elseif ($arg == 'group_undone_task')
		{
			$getData = $this->M_pm->task_undone();			
			$data['list'] = $getData;									
		}

		echo json_encode($data);		
	}
	
	public function store()
	{
		# code...
		$text_status = '';
		$res_data    = '';
		$reload      = 0;
		$requestData = $this->Globals->requestData();		
		$data_sender = array
		(
			'name' 		 => $requestData['name'],
			'title' 	 => $requestData['f_title'],			
			'desc' 		 => $requestData['f_desc'],						
			'crud' 		 => $requestData['crud'],
			'oid_parent' => $requestData['oid_parent'],			
			'oid'		 => $requestData['oid'], 
		);
				
		if ($data_sender['crud'] == 'update_board') 
		{
			# code...
			$data_store = $this->Globals->logStore('update');			
			$checkData = $this->Stores->getWhere('il_pm_board',array('AND'=>array('id'=>$data_sender['oid'])))->result_array();
			if ($checkData != array()) {
				# code...
				$data_store['title'] = $data_sender['name'];
				$res_data			 = $this->Stores->update('il_pm_board',$data_store,array('id'=>$data_sender['oid']));
				$text_status		 = $this->Stores->status($res_data,'Data disimpan.');				
			}					
		}
		elseif ($data_sender['crud'] == 'insert_card') {
			# code...
			$data_store = $this->Globals->logStore('insert');			
			if ($data_sender['oid_parent'] == 1) {
				# code...
				$data_store['status']      = 1;				
				$data_store['title']       = $data_sender['name'];
				$data_store['id_pm_board'] = $data_sender['oid_parent'];			
				$res_data                  = $this->Stores->insert('il_pm_card',$data_store);
				$text_status               = $this->Stores->status($res_data,'Data disimpan.');				
			}
			else
			{
				$res_data = false;
				$text_status = "Tidak diizinkan";				
			}			
		}
		elseif ($data_sender['crud'] == 'move_card') {
			# code...
			$data_store = $this->Globals->logStore('update');			
			$data_store['id_pm_board'] = $data_sender['oid_parent'];
			$res_data			 = $this->Stores->update('il_pm_card',$data_store,array('id'=>$data_sender['oid']));
			$text_status		 = $this->Stores->status($res_data,'Data disimpan.');			
		}
		elseif ($data_sender['crud'] == 'delete_card') {
			# code...
			$getData = $this->Stores->getWhere('il_pm_card',array('AND'=>array('id'=>$data_sender['oid'])))->result_array();
			if ($getData != array()) {
				# code...
				if ($getData[0]['created_by_nip'] == $this->session->userdata('sesNip')) {
					# code...
					$data_store = $this->Globals->logStore('update');			
					$data_store['status'] 	 = 4;
					$data_store['is_delete'] = 1;
					$res_data			  	 = $this->Stores->update('il_pm_card',$data_store,array('id'=>$data_sender['oid']));
					$text_status		  	 = $this->Stores->status($res_data,'Card dihapus.');			
					$reload					 = 1;										
				}
			}			
		}
		elseif ($data_sender['crud'] == 'update_card') {
			# code...
			$data_store = $this->Globals->logStore('update');			
			$data_store['title'] 	 = $data_sender['name'];			
			$res_data			  	 = $this->Stores->update('il_pm_card',$data_store,array('id'=>$data_sender['oid']));
			$text_status		  	 = $this->Stores->status($res_data,'Data disimpan.');			
			$reload					 = 1;
		}
		elseif ($data_sender['crud'] == 'add_member') {
			# code...
			$checkData = $this->Stores->getWhere('il_pm_card_member',array('AND'=>array('id_pm_card'=>$data_sender['oid_parent'],'nip'=>$data_sender['oid'])))->result_array();
			if ($checkData == array()) {
				# code...
				$data_store = $this->Globals->logStore('insert');				
				$data_store['status']      = 1;				
				$data_store['nip']         = $data_sender['oid'];
				$data_store['id_pm_card']  = $data_sender['oid_parent'];			
				$res_data                  = $this->Stores->insert('il_pm_card_member',$data_store);
				$text_status               = $this->Stores->status($res_data,'Data disimpan.');				
			}
			else
			{
				$data_store = $this->Globals->logStore('update');				
				if ($checkData[0]['status'] == 0) {
					# code...
					$data_store['status']      = 1;			
					$res_data                  = $this->Stores->update('il_pm_card_member',$data_store,array('id_pm_card'=>$data_sender['oid_parent'],'nip'=>$data_sender['oid']));
					$text_status               = $this->Stores->status($res_data,'Data disimpan.');					
				} else {
					# code...
					$res_data = false;
					$text_status = 'Gagal Menyimpan, Data Sudah Ada';
				}
				
			}
		}
		elseif ($data_sender['crud'] == 'delete_member') {
			# code...
			$data_store = $this->Globals->logStore('update');			
			$data_store['status'] 	 = 4;
			$data_store['is_delete'] = 1;						
			$res_data                  = $this->Stores->update('il_pm_card_member',$data_store,array('id_pm_card'=>$data_sender['oid_parent'],'nip'=>$data_sender['oid']));
			$text_status               = $this->Stores->status($res_data,'Data dihapus.');			
		}
		elseif ($data_sender['crud'] == 'add_task') {
			# code...
			$data_store = $this->Globals->logStore('insert');			
			$data_store['status']     = 1;
			$data_store['is_done']    = 0;			
			$data_store['title']      = $data_sender['title'];
			$data_store['desc']       = $data_sender['desc'];			
			$data_store['id_pm_card'] = $data_sender['oid_parent'];
			$data_store['nip']        = $data_sender['name'];			
			$res_data                 = $this->Stores->insert('il_pm_task',$data_store);												
			$text_status              = $this->Stores->status($res_data,'');			
		}		
		elseif ($data_sender['crud'] == 'delete_task') {
			# code...
			$getData = $this->Stores->getWhere('il_pm_task',array('AND'=>array('id'=>$data_sender['oid'])))->result_array();
			if ($getData != array()) {
				# code...
				if ($getData[0]['created_by_nip'] == $this->session->userdata('sesNip')) {
					# code...
					$data_store = $this->Globals->logStore('update');			
					$data_store['status'] 	 = 4;
					$data_store['is_delete'] = 1;						
					$res_data                  = $this->Stores->update('il_pm_task',$data_store,array('id'=>$data_sender['oid']));
					$text_status               = $this->Stores->status($res_data,'Data dihapus.');										
				}
			}						
		}
		elseif ($data_sender['crud'] == 'task_done') {
			# code...
			$data_store = $this->Globals->logStore('update');			
			$data_store['is_done']	   = 1;						
			$res_data                  = $this->Stores->update('il_pm_task',$data_store,array('id'=>$data_sender['oid']));
			$text_status               = $this->Stores->status($res_data,'Data dihapus.');			
		}				
		elseif ($data_sender['crud'] == 'task_undone') {
			# code...
			$data_store = $this->Globals->logStore('update');			
			$data_store['is_done']	   = 0;						
			$res_data                  = $this->Stores->update('il_pm_task',$data_store,array('id'=>$data_sender['oid']));
			$text_status               = $this->Stores->status($res_data,'Data dihapus.');			
		}
		elseif ($data_sender['crud'] == 'welldone_task') {
			# code...
			$getData = $this->Stores->getWhere('il_pm_task',array('AND'=>array('id'=>$data_sender['oid'])))->result_array();
			if ($getData != array()) {
				# code...
				if ($getData[0]['created_by_nip'] == $this->session->userdata('sesNip')) {
					# code...
					$data_store = $this->Globals->logStore('update');
					$data_store['status']	   = 2;						
					$res_data                  = $this->Stores->update('il_pm_task',$data_store,array('id'=>$data_sender['oid']));
					$text_status               = $this->Stores->status($res_data,'Data dihapus.');										
				}
			}			
		}
		elseif ($data_sender['crud'] == 'edit_task') {
			# code...
			$data_store = $this->Globals->logStore('update');
			$data_store['title']      = $data_sender['title'];
			$data_store['desc']       = $data_sender['desc'];			
			$data_store['nip']        = $data_sender['name'];						
			$res_data                  = $this->Stores->update('il_pm_task',$data_store,array('id'=>$data_sender['oid']));
			$text_status               = $this->Stores->status($res_data,'Data dihapus.');			
		}				

		$res = array
					(
						'status' => false,
						'text'   => $text_status,
						'reload' => $reload
					);
		echo json_encode($res);		
	}	
}
		