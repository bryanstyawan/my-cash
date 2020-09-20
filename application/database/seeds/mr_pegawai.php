<?php

class Mr_pegawai extends Seeder {

    private $table = 'mr_pegawai';

    public function run() {
        $this->db->truncate($this->table);

		$lines = file(APPPATH . 'database/sql/mr_pegawai.sql');
		echo "Tunggu yah, import bakal lama";
		echo ">\n";		
		$this->Globals->importSqlFromFile($lines,$this->table);
		echo ">\n";
		echo "Table Pegawai selesai";		

        echo PHP_EOL;
    }
}
