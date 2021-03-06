<?php

class Migration_fdn_category_expenses extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
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
        $this->dbforge->create_table('fdn_category_expenses');
    }

    public function down() {
        $this->dbforge->drop_table('fdn_category_expenses');
    }

}
