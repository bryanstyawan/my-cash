<?php

class il_pm_card extends Seeder {

    private $table = 'il_pm_card';

	public function run() {
        $this->db->truncate($this->table);

		$lines = file(APPPATH . 'database/sql/il_pm_card.sql');
		$this->Globals->importSqlFromFile($lines,$this->table);		
		echo ">\n";
		echo "Table Board selesai";		

        echo PHP_EOL;
    }
}
