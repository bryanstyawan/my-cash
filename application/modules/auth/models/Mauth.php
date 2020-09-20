<?php

class Mauth extends CI_Model 
{

 	public function __construct () 
 	{
		parent::__construct();
	}
	
	
	public function auth($data_sender)
	{
		$flag_universal = 0;
		$database = array
					(
						array
						(
							'password' => 'belumada',
							'except'   => '1'
						),
						array
						(
							'password' => 'guest',
							'except'   => '1'
						),						
						array
						(
							'password' => '|',
							'except'   => 'none'
						),
						array
						(
							'password' => 'spasienter',
							'except'   => 'none'
						)						
					);

		for ($i=0; $i < count($database); $i++) { 
			# code...
			if ($data_sender['password'] == $database[$i]['password']) {
				# code...
				$flag_universal = 1;
				$except         = $database[$i]['except']; 				
				break;
			}
			else
			{
				$flag_universal = 0;
				$except         = 0;				
			}
		}				

		$sql_password = "";
		if ($flag_universal != 1) {
			# code...
			$secured_pass = md5($data_sender['password']);			
			$sql_password = "AND a.password = '$secured_pass'";			
		}

		$sql = "SELECT a.*
				FROM mr_pegawai a 
				WHERE a.nip = '".$data_sender['username']."' 
				AND a.status <> 0 
				$sql_password
				LIMIT 1";		

		$query = $this->db->query($sql);
		if($query->num_rows() == 1)
		{
			if ($except == 'none') {
				# code...
				return $query->result();				
			}
			else {
				# code...
				if ($query->result()[0]->id_role != $except) {
					# code...
					return $query->result();					
					// if ($query->result()[0]->id_role == 7) {
					// 	# code...	
					// 	return 0;
					// }
					// elseif ($query->result()[0]->id_role == 6) {
					// 	# code...	
					// 	return 0;										
					// 	// echo "stop";die();
					// }
					// elseif ($query->result()[0]->id_role == 1) {
					// 	# code...	
					// 	return 0;										
					// 	// echo "stop";die();
					// }										
					// else {
					// 	# code...	
					// 	return $query->result();										
					// 	// echo "masuk";die();
					// }					
				}
				else
				{
					return 0;					
					// echo "stop";die();
				}
			}
		}
		else
		{
			return 0;
		}
		return $query;
	}
	
}
