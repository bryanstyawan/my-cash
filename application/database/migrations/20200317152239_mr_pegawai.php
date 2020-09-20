<?php

class Migration_mr_pegawai extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'nip' => array(
                'type' => 'VARCHAR',
                'constraint' => 20
			),
            'nama' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
			),
            'tempat_lahir' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
			),
            'tanggal_lahir' => array(
                'type' => 'DATE'
			),
            'alamat' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
			),
            'jenis_kelamin' => array(
                'type' => 'VARCHAR',
                'constraint' => 1
			),
            'id_agama' => array(
                'type' => 'INT',
                'constraint' => 11
			),
            'photo' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
			),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
			),
            'id_role' => array(
                'type' => 'INT',
                'constraint' => 11
			),			
            'status' => array(
                'type' => 'INT',
                'constraint' => 11
			),
            'no_hp' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
			),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 50
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
        $this->dbforge->add_key('nip', TRUE);
        $this->dbforge->create_table('mr_pegawai');
    }

    public function down() {
        $this->dbforge->drop_table('mr_pegawai');
    }

}
