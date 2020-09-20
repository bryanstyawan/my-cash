<?php

class config_permissions extends Seeder {

    private $table = 'config_permissions';

    public function run() {
        $this->db->truncate($this->table);

		$lines = file(APPPATH . 'database/sql/'.$this->table.'.sql');
		echo "Tunggu yah, import bakal lama";
		echo ">\n";		
		$this->Globals->importSqlFromFile($lines,$this->table);
		echo ">\n";
		echo "Table ".$this->table." selesai";		

        echo PHP_EOL;
    }
}
