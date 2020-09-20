<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Expenses extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title']	= 'Expenses';
		$view			= $this->load->view('fondation/expenses/index',$data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		$data = array();
		if ($arg == 'table') {
			# code...
			$data['list'] = $this->Stores->getWhere('mr_grade',array('AND'=>array('status' => 1)))->result_array();			
		}
		else
		{
			$data['list'] = $this->Stores->getWhere('mr_grade',array('AND'=>array('id'=>$id,'status' => 1)))->result_array();			
		}

		echo json_encode($data);		
	}
	
	public function store()
	{
		# code...
		$text_status = '';
		$res_data    = '';
		$requestData = $this->Globals->requestData();		
		$data_sender = array
		(
			'grade'     => $requestData['f_grade'],
			'tunjangan' => $requestData['f_tunjangan'],
			'crud'      => $requestData['crud'],
			'oid'       => $requestData['oid'], 
		);
		
		$data_store = $this->Globals->logStore($data_sender['crud']);		
		if ($data_sender['crud'] == 'insert') 
		{
			# code...
			$checkData = $this->Stores->getWhere('mr_grade',array('AND'=>array('grade' => $data_sender['grade'])))->result_array();
			if ($checkData == array()) {
				# code...
				$data_store['grade']     = $data_sender['grade'];
				$data_store['tunjangan'] = $data_sender['tunjangan'];
				$data_store['status'] 	 = 1;
				$res_data                = $this->Stores->insert('mr_grade',$data_store);
				$text_status             = $this->Stores->status($res_data,'Data berhasil ditambahkan.');				
			}
			else
			{
				$res_data = false;
				$text_status = 'Gagal Menyimpan, data telah ada.';				
			}
		}
		elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['tunjangan'] = $data_sender['tunjangan'];
			$res_data                = $this->Stores->update('mr_grade',$data_store,array('id' => $data_sender['oid']));
			$text_status             = $this->Stores->status($res_data,'Data berhasil diubah.');			
		}
		elseif ($data_sender['crud'] == 'delete') {
			# code...
			$data_store['status']    = 4;			
			$res_data                = $this->Stores->update('mr_grade',$data_store,array('id' => $data_sender['oid']));
			$text_status             = $this->Stores->status($res_data,'Data berhasil diarsipkan.');			
		}
		
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}		
}
		