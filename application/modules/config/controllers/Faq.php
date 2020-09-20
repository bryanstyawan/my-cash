<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title']	= 'FAQ';
		$view			= $this->load->view('config/faq/index',$data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		$data = array();
		if ($arg == 'table') {
			# code...
			$data['list'] = $this->Stores->getWhere('config_faq',array('AND'=>array('status'=>1)))->result_array();			
		}
		else
		{
			$data['list'] = $this->Stores->getWhere('config_faq',array('AND'=>array('id'=>$id,'status'=>1)))->result_array();			
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
			'pertanyaan' 		=> $requestData['f_pertanyaan'],
			'jawaban' 			=> $requestData['f_jawaban'],
			'crud' 				=> $requestData['crud'],
			'oid'				=> $requestData['oid'], 
		);
		
		$data_store = $this->Globals->logStore($data_sender['crud']);		
		if ($data_sender['crud'] == 'insert') 
		{
			# code...
			$data_store['pertanyaan'] = $data_sender['pertanyaan'];
			$data_store['jawaban'] 	  = $data_sender['jawaban'];
			$data_store['status'] 	  = 1;
			$res_data				  = $this->Stores->insert('config_faq',$data_store);
			$text_status			  = $this->Stores->status($res_data,'Data berhasil ditambahkan.');			
		}
		elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['pertanyaan'] = $data_sender['pertanyaan'];
			$data_store['jawaban'] 	  = $data_sender['jawaban'];
			$res_data				  = $this->Stores->update('config_faq',$data_store,array('id' => $data_sender['oid']));
			$text_status		      = $this->Stores->status($res_data,'Data berhasil diubah.');			
		}
		elseif ($data_sender['crud'] == 'delete') {
			# code...
			$data_store['status'] 	  = 4;
			$res_data				  = $this->Stores->update('config_faq',$data_store,array('id' => $data_sender['oid']));
			$text_status			  = $this->Stores->status($res_data,'Data berhasil diarsipkan.');			
		}
		
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}	
}
		