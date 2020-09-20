<?php

class Migration_il_pm_card_member extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id_pm_card' => array(
                'type' => 'INT',
                'constraint' => 11
			),			
			'nip' => array(
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
        $this->dbforge->create_table('il_pm_card_member');
    }

    public function down() {
        $this->dbforge->drop_table('il_pm_card_member');
    }

}
