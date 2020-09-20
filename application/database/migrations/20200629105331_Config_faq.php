<?php

class Migration_Config_faq extends CI_Migration {

	public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
			'pertanyaan' => array(
                'type' => 'TEXT',
                'constraint' => NULL
			),
			'jawaban' => array(
                'type' => 'TEXT',
                'constraint' => NULL
			),
			'status' => array(
                'type' => 'INT',
                'constraint' => 3
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
			)			
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('config_faq');
    }

    public function down() {
        $this->dbforge->drop_table('config_faq');
    }

}