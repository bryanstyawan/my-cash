<?php
class M_pm extends CI_Model
{
	public function __construct () {
		parent::__construct();
	}

	public function get_member($id_card)
	{
		$sql = "SELECT DISTINCT pg.photo, pg.nip, pg.nama
				FROM il_pm_card_member a
				JOIN mr_pegawai pg ON a.nip = pg.nip
				WHERE a.id_pm_card = '".$id_card."'
				AND a.status = 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}
	}

	public function task_undone()
	{
		$sql = "SELECT COALESCE(b.nama,'none') as name,
						a.nip,
						b.photo,
						COUNT(a.nip) as counter
				FROM il_pm_task a
				LEFT JOIN mr_pegawai b ON a.nip = b.nip
				WHERE a.status = 1
				AND a.is_done = 0
				GROUP BY a.nip";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}
	}	
	
}
		