<?php

class Migration_add_pic_on_il_pm_task extends CI_Migration {

    public function up() {
		$fields = array(				
			'nip' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			)			
	);
	$this->dbforge->add_column('il_pm_task', $fields);
    }

    public function down() {
        $this->dbforge->drop_table('il_pm_task');
    }

}
