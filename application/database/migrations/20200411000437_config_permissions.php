<?php

class Migration_config_permissions extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_menus' => array(
                'type' => 'INT',
                'constraint' => 11
			),
            'id_groups' => array(
                'type' => 'INT',
                'constraint' => 11
			),
            'id_config_specialized' => array(
                'type' => 'INT',
                'constraint' => 5
			),			
            'read' => array(
                'type' => 'INT',
                'constraint' => 5
			),
            'create' => array(
                'type' => 'INT',
                'constraint' => 5
			),
            'update' => array(
                'type' => 'INT',
                'constraint' => 5
			),
            'delete' => array(
                'type' => 'INT',
                'constraint' => 5
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
        $this->dbforge->create_table('config_permissions');
    }

    public function down() {
        $this->dbforge->drop_table('config_permissions');
    }

}
