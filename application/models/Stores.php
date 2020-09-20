<?php 
	
class Stores extends CI_Model {

	public function __construct () {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');				
	}

	/** 
	 * Name 		 : get($table,$order=NULL,$limit=NULL)
	 * Remark		 : get all data 
	 * parameter desc: 
	 * 				$table 			= table name
	 * 				$order			= Order results
	 * 				$limit			= Limit
	 * 
	 * How to use:
	 * 				1.	$this->Stores->getWhere('config_menus')
	 * 				2.	$this->Stores->getWhere('config_menus','id DESC')
	*/	
	public function get($table,$order=NULL,$limit=NULL)
	{
		$query = $this->db->get($table);
		if ($limit != NULL) {
			# code...
			$this->db->limit($limit);			
		}
		return $query;
	}

	/** 
	 * Name 		 : insert($table,$data)
	 * Remark		 : insert data 
	 * parameter desc: 
	 * 				$table 			= table name
	 * 				$data 			= data store 
	 * 
	 * How to use:
	 * 				1.	$this->Stores->insert('config_menus',array('name'=>'test','remark'=>'test'))
	*/	
	public function insert($table,$data)
	{
		$query = $this->db->insert($table,$data);
		return $query;
	}

	/** 
	 * Name 		 : insertAndGetId($table,$data)
	 * Remark		 : insert data with return id 
	 * parameter desc: 
	 * 				$table 			= table name
	 * 				$data 			= data store 
	 * 
	 * How to use:
	 * 				1.	$this->Stores->insertAndGetId('config_menus',array('name'=>'test','remark'=>'test'))
	*/	
	public function insertAndGetId($table,$data)
	{
		$query     = $this->db->insert($table,$data);
		$insert_id = $this->db->insert_id();
		
		return  $insert_id;		
	}	

	/** 
	 * Name 		 : delete($table,$where)
	 * Remark		 : Delete data 
	 * parameter desc: 
	 * 				$table 			= table name
	 * 				$where 			= parameter (AND) 
	 * 
	 * How to use:
	 * 				1.	$this->Stores->delete('config_menus',array('id'=>$id))
	*/	
	public function delete($table,$where)
	{
		$this->db->where($where);
		$query = $this->db->delete($table);

		return $query;
	}

	/** 
	 * Name 		 : getWhere($table,$filterData,$order)
	 * Remark		 : Looking for similar data 
	 * parameter desc: 
	 * 				$table 			= table name
	 * 				$filterData 	= parameter get data (AND, OR, LIKE) 
	 * 				$order			= Order results
	 * 
	 * How to use:
	 * 				1.	$this->Stores->getWhere('config_menus',array('AND'=>array('id'=>$id)))	
	 * 				2.	$this->Stores->getWhere('config_menus',array('OR'=>array('id'=>$id)))
	 * 				3.	$this->Stores->getWhere('config_menus',array('LIKE'=>array('name'=>'dash')))
	 * 				3.	$this->Stores->getWhere('config_menus',array('LIKE'=>array('name'=>'dash')),'id DESC')
	 * 				4.	$this->Stores->getWhere('config_menus',array('AND'=>array('status'=>0),'OR'=>array('status'=>2))) 
	*/
	public function getWhere($table,$filterData=NULL,$order=NULL)
	{
		if (array_key_exists('AND',$filterData)) 
		{
			# code...
			$this->db->where($filterData['AND']);				
		}

		if (array_key_exists('OR',$filterData)) 
		{
			# code...
			$this->db->or_where($filterData['OR']);				
		}
		
		if (array_key_exists('LIKE',$filterData)) 
		{
			# code...
			$this->db->like($filterData['LIKE']);
		}
		
		if ($order != NULL) {
			# code...
			$this->db->order_by($order);			
		}

		return $this->db->get($table);
	}

	/** 
	 * Name 		 : update($table,$data,$where)
	 * Remark		 : update data 
	 * parameter desc: 
	 * 				$table 			= table name
	 * 				$data 			= data store
	 * 				$where			= parameter 
	 * 
	 * How to use:
	 * 				1.	$this->Stores->insert('config_menus',array('name'=>'test','remark'=>'test'),array('id'=>$id))
	*/	
	public function update($table,$data,$where)
	{
		$this->db->where($where);
		
		return $this->db->update($table,$data);
	}

	/** 
	 * Name 		 : status($res_data,$text_status=NULL)
	 * Remark		 : get status text from CRUD procedure  
	 * parameter desc: 
	 * 				$table 			= table name
	 * 				$data 			= data store
	 * 				$where			= parameter 
	 * 
	 * How to use:
	 * 				1.	$this->Stores->insert('config_menus',array('name'=>'test','remark'=>'test'),array('id'=>$id))
	*/	
	public function status($res_data,$text_status=NULL)
	{
		# code...
		if ($res_data == 1) 
		{
			# code...
			$text_status = $text_status;
		}
		elseif ($res_data == 2) 
		{
			$text_status = $text_status;
		}
		else
		{
			$text_status = "A system error has occurred";
		}

		return $text_status;
	}	
}
