<?php

class Migration_il_pm_task extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
            'id_pm_card' => array(
                'type' => 'INT',
                'constraint' => 11
			),			
			'title' => array(
				'type' => 'TEXT'
			),
			'desc' => array(
				'type' => 'TEXT'
			),						
			'border' => array(
				'type' => 'VARCHAR',
				'constraint' => 20
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
			),
			'is_done' => array(
				'type' => 'INT',
				'constraint' => 11
			)						
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('il_pm_task');
    }

    public function down() {
        $this->dbforge->drop_table('il_pm_task');
    }

}
