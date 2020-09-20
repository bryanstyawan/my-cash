<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Mauth', '', TRUE);
		date_default_timezone_set('Asia/Jakarta');				
	}
	
	public function index()
	{				
		if($this->session->userdata('login') == "")
		{
			$getData = $this->Stores->getWhere('config_background_login',array('AND'=>array('status'=>1)))->result_array();
			$data['logo'] = ($getData != array()) ? $getData[0]['image'] : '33.png' ;
			$this->load->view('auth/index',$data);
		}		
		else
		{
			redirect('dashboard/home');
		}

	}

	public function process()
	{
		$requestData = $this->Globals->requestData();
		$data_sender = array
		(
			'username' 	=> $requestData['username'],
			'password' 	=> $requestData['password'] 
		);

		$verify = $this->Mauth->auth($data_sender);
		if ($verify != 0) {
			# code...
			$data = array
						(
							'sesNip'          => $verify[0]->nip,
							'sesNama'         => $verify[0]->nama,
							'sesno_hp'        => $verify[0]->no_hp,
							'sesEmail'        => $verify[0]->email,
							'sesTtl'          => $verify[0]->tanggal_lahir,
							'sesTempat'       => $verify[0]->tempat_lahir,
							'sesAlamat'       => $verify[0]->alamat,
							'sesphoto'        => $verify[0]->photo,			
							'sesRole'         => $verify[0]->id_role,
							'login'           => TRUE
						);			
			$this->session->set_userdata($data);						
			$res = array
			(
				'status' => 1,
				'text'   => 'Verifikasi berhasil'
			);
			echo json_encode($res);			
		}
		else
		{
			$res = array
			(
				'status' => 0,
				'text'   => 'Verifikasi user gagal, nip atau password tidak sesuai'
			);
			echo json_encode($res);
		}

	}
	
	public function signout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function v()
	{
		# code...
		echo CI_VERSION;die();
		error_reporting(E_ALL ^ E_WARNING);		
	}
	
}

