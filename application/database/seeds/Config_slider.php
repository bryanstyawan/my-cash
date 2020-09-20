<?php

class Config_slider extends Seeder {

    private $table = 'Config_slider';

    public function run() {
        $this->db->truncate($this->table);

		$templine = '';
		$lines = file(APPPATH . 'database/sql/config_slider.sql');
		$this->Globals->importSqlFromFile($lines,$this->table);
		echo ">\n";
		echo "Table komponen selesai";		

        echo PHP_EOL;
    }
}
