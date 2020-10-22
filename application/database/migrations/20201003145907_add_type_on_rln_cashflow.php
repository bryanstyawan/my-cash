<?php

class Migration_add_type_on_rln_cashflow extends CI_Migration {

    public function up() {
		$fields = array(				
			'type' => array(
				'type' 			=> 'VARCHAR', 
				'after' 		=> 'is_delete',
				'constraint'	=> 15
			)
	);
		$this->dbforge->add_column('rln_cashflow', $fields);
    }

    public function down() {
        $this->dbforge->drop_table('rln_cashflow');
    }

}
