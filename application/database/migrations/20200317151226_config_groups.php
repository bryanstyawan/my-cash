<?php

class Migration_config_groups extends CI_Migration {

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
            'remarks' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
			),			
            'created_by_nip' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'date_created' => array(
                'type' => 'DATETIME'
			),
			'updated_by_nip' => array(
				'type' 			=> 'VARCHAR', 
				'after' 		=> 'created_by_nip',
				'constraint'	=> 100
			),			
            'date_updated' => array(
                'type' => 'DATETIME'
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('config_groups');
    }

    public function down() {
        $this->dbforge->drop_table('config_groups');
    }

}
