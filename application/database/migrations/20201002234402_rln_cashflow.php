<?php

class Migration_rln_cashflow extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
			'fdn_category_income_id' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'fdn_category_expenses_id' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'fdn_salary_sources_id' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),	
			'value' => array(
				'type' => 'INT',
				'constraint' => '20'
			),
			'date' => array(
				'type' => 'DATE',
				'constraint' => NULL
			),									
			'created_by_nip' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'updated_by_nip' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),			
			'date_created' => array(
				'type' => 'DATE',
				'constraint' => NULL
			),
			'date_updated' => array(
				'type' => 'DATE',
				'constraint' => NULL				
			),
			'status' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'is_delete' => array(
				'type' => 'INT',
				'constraint' => 11
			)			
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('rln_cashflow');
    }

    public function down() {
        $this->dbforge->drop_table('rln_cashflow');
    }

}
