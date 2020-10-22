<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Salary_sources extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	private $data = [];

	public function index()
	{
		$this->data['title']	= 'Salary Sources';
		$view			= $this->load->view('fondation/salary_sources/index',$this->data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		if ($arg == 'table') {
			# code...
			$this->data['list'] = $this->Stores->get('fdn_salary_sources')->result_array();			
		}
		else
		{
			$this->data['list'] = $this->Stores->getWhere('fdn_salary_sources',array('AND'=>array('id'=>$id)))->result_array();			
		}

		echo json_encode($this->data);		
	}
	
	public function store()
	{
		# code...
		$text_status = '';
		$res_data	  = '';
		$requestData = $this->Globals->requestData();		
		$data_sender = array
		(
			'name' 		=> $requestData['f_name'],
			'value' 	=> $requestData['f_value'],			
			'crud' 		=> $requestData['crud'],
			'oid'		=> $requestData['oid'], 
		);
		
		$data_store = $this->Globals->logStore($data_sender['crud']);
		if ($data_store != 0) {
			if ($data_sender['crud'] == 'insert') 
			{
				# code...
				$checkData = $this->Stores->getWhere('fdn_salary_sources',array('AND'=>array('name' => $data_sender['name'])))->result_array();
				if ($checkData == array()) {
					# code...
					$data_store['name']     = $data_sender['name'];
					$data_store['value']     = $data_sender['value'];					
					$data_store['status'] 	 = 1;
					$res_data                = $this->Stores->insert('fdn_salary_sources',$data_store);
					$text_status             = $this->Stores->status($res_data,'Your data has been successfully saved.');				
				}
				else
				{
					$res_data = false;
					$text_status = 'Failed to save data, data already exists.';				
				}
			}
			elseif ($data_sender['crud'] == 'update') {
				# code...
				$data_store['name']     = $data_sender['name'];
				$data_store['value']     = $data_sender['value'];				
				$res_data                = $this->Stores->update('fdn_salary_sources',$data_store,array('id' => $data_sender['oid']));
				$text_status             = $this->Stores->status($res_data,'Your data has been successfully updated.');							
			}
			elseif ($data_sender['crud'] == 'delete') {
				# code...
				$data_store['status']    = 4;			
				$res_data                = $this->Stores->update('fdn_salary_sources',$data_store,array('id' => $data_sender['oid']));
				$text_status             = $this->Stores->status($res_data,'Your data has been successfully deleted.');				
			}						
		}
		else
		{
			$res_data    = 'logoff';
			$text_status = 'Im sorry, your session has been expired.';			
		}				
		
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}	
}
		