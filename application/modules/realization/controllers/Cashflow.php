<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cashflow extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Mcashflow','cfw');		
	}

	private $data = [];

	public function index()
	{
		$this->data['title']	= 'Realization > Cashflow';
		$view			= $this->load->view('realization/cashflow/index',$this->data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		if ($arg == 'list') {
			# code...
			$this->data['list'] = $this->cfw->cashflow('2020-10')->result_array();
		}
		elseif ($arg == 'select') {
			# code...
			$this->data = [
				[
					'name'   => 'f_oid_expenses',
					'detail' => $this->Stores->get('fdn_category_expenses')->result_array() 
				],				
				[
					'name'   => 'f_oid_income',
					'detail' => $this->Stores->get('fdn_category_income')->result_array() 
				],
				[
					'name'   => 'f_oid_salary_sources',
					'detail' => $this->Stores->get('fdn_salary_sources')->result_array() 
				]				
			];			
		}
		else
		{
			$this->data['list'] = $this->Stores->getWhere('rln_cashflow',array('AND'=>array('id'=>$id)))->result_array();			
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
			'name'                     => $requestData['f_name'],
			'value'                    => $requestData['f_value'],
			'date'                     => $requestData['f_date'],
			'fdn_category_income_id'   => $requestData['f_oid_income'],
			'fdn_category_expenses_id' => $requestData['f_oid_expenses'],
			'fdn_salary_sources_id'    => $requestData['f_oid_salary_sources'],															
			'crud'                     => $requestData['crud'],
			'oid'                      => $requestData['oid'], 
			'type'                     => $requestData['type'], 			
		);
		
		$data_store = $this->Globals->logStore($data_sender['crud']);
		if ($data_store != 0) {
			if ($data_sender['crud'] == 'insert' || $data_sender['crud'] == 'update') 
			{
				# code...
				$data_store['name']   = $data_sender['name'];
				$data_store['value']  = $data_sender['value'];
				$data_store['date']   = $data_sender['date'];
				$data_store['type']   = $data_sender['type'];
				$data_store['status'] = 1;				
				if ($data_sender['type'] == 'income') {
					# code...
					$data_store['fdn_category_income_id']   = $data_sender['fdn_category_income_id'];					
					$data_store['fdn_category_expenses_id'] = 0;
					$data_store['fdn_salary_sources_id']    = 0;					
				}
				else
				{
					$data_store['fdn_category_income_id']   = 0;					
					$data_store['fdn_category_expenses_id'] = $data_sender['fdn_category_expenses_id'];
					$data_store['fdn_salary_sources_id']    = $data_sender['fdn_salary_sources_id'];
				}				

				if ($data_sender['crud'] == 'insert') {
					# code...
					$res_data    = $this->Stores->insert('rln_cashflow',$data_store);
					$text_status = $this->Stores->status($res_data,'Your data has been successfully saved.');					
				}
				else
				{
					$res_data    = $this->Stores->update('rln_cashflow',$data_store,array('id' => $data_sender['oid']));
					$text_status = $this->Stores->status($res_data,'Your data has been successfully updated.');							
				}

			}
			elseif ($data_sender['crud'] == 'delete') {
				# code...
				$data_store['status']    = 4;			
				$res_data                = $this->Stores->update('rln_cashflow',$data_store,array('id' => $data_sender['oid']));
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
