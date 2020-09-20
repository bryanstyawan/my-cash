<?php

class Migration_config_menus extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
            'id_parent' => array(
                'type' => 'INT',
                'constraint' => 11
			),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
			),				
            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
			),	
            'icon' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
			),
            'status' => array(
                'type' => 'INT',
                'constraint' => 3
			),
            'sort_number' => array(
                'type' => 'INT',
                'constraint' => 11
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
			)			
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('config_menus');
    }

    public function down() {
        $this->dbforge->drop_table('config_menus');
    }

}
