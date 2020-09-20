<?php

class Migration_add_field_status_on_config_group extends CI_Migration {

    public function up() {
		$fields = array(
			'status' => array(
				'type' 			=> 'INT', 
				'after' 		=> 'date_updated',
				'null'			=> FALSE,
				'constraint'	=> 11
			)				
		);
		$this->dbforge->add_column('config_groups', $fields);
    }

    public function down() {
        $this->dbforge->drop_table('config_groups');
    }

}
