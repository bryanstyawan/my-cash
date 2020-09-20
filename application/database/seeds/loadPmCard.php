<?php

class loadPmCard extends Seeder {
    public function run() {
		$this->call('il_pm_board');
		$this->call('il_pm_card');
		$this->call('il_pm_card_member');
		$this->call('il_pm_task');		        
        echo PHP_EOL;
    }
}
