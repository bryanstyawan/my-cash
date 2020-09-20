<?php

class Migration_config_backround_login extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
			'image' => array(
				'type' => 'text',
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
			'is_delete' => array(
				'type' => 'INT',
				'constraint' => 11
			),
			'status' => array(
				'type' => 'INT',
				'constraint' => 11
			)				
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('config_background_login');
    }

    public function down() {
        $this->dbforge->drop_table('config_background_login');
    }

}
