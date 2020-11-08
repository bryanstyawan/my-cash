<?php
class Mcashflow extends CI_Model
{
	public function __construct () {
		parent::__construct();
	}

	public function cashflow($date)
	{
		// code...
		$sql = "SELECT DISTINCT a.*, b.name as name_income, c.name as name_expenses, d.name as name_sources_salary
				FROM rln_cashflow a
				LEFT JOIN fdn_category_income b ON a.fdn_category_income_id=b.id
				LEFT JOIN fdn_category_expenses c ON a.fdn_category_expenses_id=c.id
				LEFT JOIN fdn_salary_sources d ON a.fdn_salary_sources_id=d.id
				WHERE a.date LIKE '%".$date."%'								
				";
		$query = $this->db->query($sql);
		return $query;
	}
}
		