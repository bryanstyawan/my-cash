<?php

class loadConfig extends Seeder {

    private $table = 'config';

    public function run() {
      $this->call('config_groups');
			$this->call('config_menus');
			$this->call('config_permissions');
			$this->call('config_slider');			
      echo PHP_EOL;      
    }
}
