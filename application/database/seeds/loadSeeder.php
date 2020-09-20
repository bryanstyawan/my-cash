<?php

class LoadSeeder extends Seeder {

	public function run() 
	{
		// Release (Comment bila tidak ingin lakukan seeding)
		$this->call('welcome');
		$this->call('loadPegawai');
		$this->call('loadPmCard');

		// Release Candidat
		$this->call('loadConfig');		
        echo PHP_EOL;
    }
}
