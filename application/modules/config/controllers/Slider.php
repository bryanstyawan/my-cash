<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	private $path = 'assets/images/slider/';

	public function index()
	{
		$data['title']	= 'Slider';
		$data['path'] = $this->path;
		$view			= $this->load->view('config/slider/index',$data);
		return $view;
	}	

	public function data($arg,$id)
	{
		# code...
		$data = array();
		if ($arg == 'card') {
			# code...
			$data['list'] = $this->Stores->get('config_slider')->result_array();			
		}
		else
		{
			$data['list'] = $this->Stores->getWhere('config_slider',array('AND'=>array('id'=>$id)))->result_array();			
		}

		echo json_encode($data);		
	}

	public function upload_file($param,$id)
	{
		if(!is_dir($this->path))
		{
			mkdir($this->path, 0755);
		}

		$config['upload_path']   = $this->path;
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = '3000';
		$data                    = "";
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')){
			$res_data       = 0;
			$text_status    = $this->upload->display_errors();
			$file_foto = "";
        }
        else
        {
			$res_data       = 1;
			$dataupload     = $this->upload->data();
			$status         = "success";
			$text_status    = $dataupload['file_name']." berhasil diupload";
			$file_foto = $this->upload->data('file_name');
			if ($param == 'insert') {
				$data_store['photo'] 	= $file_foto;
				$data_store['status'] 	= 1;
				$res_data				= $this->Stores->insert('config_slider',$data_store);
				$text_status			= $this->Stores->status($res_data,'Data berhasil ditambahkan.');
			}
			else if ($param == 'update')
			{	
				# code...
				$this->load->library('upload', $config);
				$res_data = $this->Stores->getWhere('config_slider',array('AND'=>array('id'=>$id)))->result_array();				
				$path_to_file = FCPATH.$config['upload_path'].$res_data[0]['photo'];
				if ($res_data[0]['photo'] != '' || $res_data[0]['photo'] != NULL) {
					# code...
					$param_file_exists = 0;
					if (file_exists($path_to_file)) {
						# code...
						$param_file_exists = 1;
						if(unlink($path_to_file)) {
							// echo 'deleted successfully';
						}
						else {
							// echo 'errors occured';
						}							
					}
					else {
						# code...
						$param_file_exists = 0;				
					}	
				}	

				$data_store['photo'] 	= $file_foto;
				$res_data				= $this->Stores->update('config_slider',$data_store,array('id'=>$id));
				$text_status			= $this->Stores->status($res_data,'Data berhasil diubah.');
			}
		}

		$res = array
		(
			'status' => $res_data,
			'text'   => $text_status,
			'file_foto'	=> $file_foto
		);
		
		echo json_encode($res);	
		
	}
	
	public function store()
	{
		# code...
		$text_status = '';
		$res_data	  = '';
		$requestData = $this->Globals->requestData();
		
		$data_sender = array
		(
			'photo' 		=> $requestData['f_photo'],
			'crud' 			=> $requestData['crud'],
			'oid'			=> $requestData['oid'], 
		);
		
		$data_store = $this->Globals->logStore($data_sender['crud']);		
		if ($data_sender['crud'] == 'insert') 
		{
			# code...
			// $data_store['photo'] 	= $data_sender['photo'];
			// $res_data				= $this->Stores->insert('config_slider',$data_store);
			// $text_status			= $this->Stores->status($res_data,'Data berhasil ditambahkan.');			
		}
		elseif ($data_sender['crud'] == 'update') {
			# code...
			// $data_store['photo'] 	= $data_sender['photo'];
			// $res_data				= $this->Stores->update('config_slider',$data_store,array('id' => $data_sender['oid']));
			// $text_status			= $this->Stores->status($res_data,'Data berhasil diubah.');			
		}
		elseif ($data_sender['crud'] == 'delete') {
			# code...
			$getData = $this->Stores->getWhere('config_slider',array('AND'=>array('id'=>$data_sender['oid'])))->result_array();				
			$path_to_file = FCPATH.$this->path.$getData[0]['photo'];			
			$res_data			= $this->Stores->delete('config_slider',array('id' => $data_sender['oid']));
			$text_status		= $this->Stores->status($res_data,'Data berhasil dihapus.');	
			($res_data) ? unlink($path_to_file) : '' ;
		}
		
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status,
					);
		echo json_encode($res);		
	}	
}
		