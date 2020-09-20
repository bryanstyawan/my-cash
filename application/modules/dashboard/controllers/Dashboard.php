<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct () {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function home()
	{
		$this->Globals->session_rule();		
		$data = array(
			'title'       => '',
			'breadcrumbs' => array(
				'status' => 0,
				'title'  => 'Dashboard',
				'data'   => array(
					0 => array(					
							'name'  => 'Dashboard',
							'class' => 'active',
							'link'  => ''
					)
				)
			),
			'content'           => 'dashboard/dev/index'  
		);

		$this->load->view('templates/materialize_template',$data);
	}

	public function ajax_home()
	{
		# code...
		$data['list']	= '';
		$data['title']	= '';
		$view			= $this->load->view('dashboard/dev/index',$data);
		return $view; 		
	}

	public function soon()
	{
		# code...
		$data['list']	= '';
		$data['title']	= '';
		$view			= $this->load->view('dashboard/soon/index',$data);
		return $view; 		
	}
	
	public function resources($data=NULL)
	{
		# code...
	}

	public function css($data=NULL)
	{
		# code...
	}	
}
