<?php

class Migration_add_verify_and_notify_on_config_permissions extends CI_Migration {

    public function up() {
		$fields = array(				
				'verify' => array(
					'type' 			=> 'INT', 
					'after' 		=> 'delete',
					'constraint'	=> 5
				),
				'notify' => array(
					'type' 			=> 'INT', 
					'after' 		=> 'delete',
					'constraint'	=> 5
				)								
		);
		$this->dbforge->add_column('config_permissions', $fields);
    }

    public function down() {
        $this->dbforge->drop_table('config_permissions');
    }

}
