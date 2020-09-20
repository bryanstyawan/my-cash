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
		$view			= $this->load->view('core/faq/index',$data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		$data = array();
		if ($arg == 'collapsible') {
			# code...
			$data['list'] = $this->Stores->getWhere('config_faq',array('AND'=>array('status'=>1)))->result_array();			
		}
		else
		{
			$data['list'] = $this->Stores->getWhere('config_faq',array('AND'=>array('id'=>$id,'status'=>1)))->result_array();			
		}

		echo json_encode($data);		
	}	
}
		