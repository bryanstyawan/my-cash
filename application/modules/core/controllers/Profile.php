<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title']	= 'Profil';
		$view			= $this->load->view('core/profile/index',$data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		$data = array();
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
			'crud' 		=> $requestData['crud'],
			'oid'		=> $requestData['oid'], 
		);		
	}	
}
		