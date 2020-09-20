<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Groups extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title']	= 'Groups';
		$view			= $this->load->view('config/groups/index',$data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		$data = array();
		if ($arg == 'table') {
			# code...
			$data['list'] = $this->Stores->getWhere('config_groups',array('AND'=>array('status'=>1)))->result_array();		
		}
		elseif ($arg == 'single') {
			# code...
			$data['list'] = $this->Stores->getWhere('config_groups',array('AND'=>array('id'=>$id)))->result_array();			
		}

		echo json_encode($data);
	}

	public function store()
	{
		$text_status = "";
		$res_data	 = "";
		$requestData = $this->Globals->requestData();
		$data_sender = array
		(
			'name' 		=> $requestData['f_name'],
			'crud' 		=> $requestData['crud'],
			'oid'		=> $requestData['oid'], 
		);

		$data_store = $this->Globals->logStore($data_sender['crud']);		
		if ($data_sender['crud'] == 'insert') 
		{
			# code...
			$data_store['name']   = $data_sender['name'];
			$data_store['status'] = 1;			
			$res_data             = $this->Stores->insert('config_groups',$data_store);
			$text_status          = $this->Stores->status($res_data,'Data berhasil ditambahkan.');			
		}
		elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['status'] = 1;			
			$data_store['name']   = $data_sender['name'];
			$res_data             = $this->Stores->update('config_groups',$data_store,array('id' => $data_sender['oid']));
			$text_status          = $this->Stores->status($res_data,'Data berhasil diubah.');			
		}
		elseif ($data_sender['crud'] == 'delete') {
			# code...
			$data_store['status'] = 4;			
			$res_data             = $this->Stores->update('config_groups',$data_store,array('id' => $data_sender['oid']));
			$text_status          = $this->Stores->status($res_data,'Data berhasil dihapus.');			
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);
	}	

}
		