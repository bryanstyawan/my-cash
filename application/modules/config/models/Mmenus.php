<?php
class Mmenus extends CI_Model
{
	public function __construct () {
		parent::__construct();
	}

	public function Menus()
	{
		// code...
		$sql = "SELECT DISTINCT a.*,b.name as name_parent
				FROM config_menus a
				LEFT JOIN config_menus b ON a.id_parent=b.id";
		$query = $this->db->query($sql);
		return $query;
	}
}
		