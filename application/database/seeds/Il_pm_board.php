<?php

class Il_pm_board extends Seeder {

	private $table = 'il_pm_board';

	public function run() {
        $this->db->truncate($this->table);

		$lines = file(APPPATH . 'database/sql/il_pm_board.sql');
		$this->Globals->importSqlFromFile($lines,$this->table);		
		echo ">\n";
		echo "Table Board selesai";		

        echo PHP_EOL;
    }
}
