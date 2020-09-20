<?php

class loadPegawai extends Seeder {

    private $table = 'loadPegawai';

    public function run() {
        $this->call('mr_pegawai');
        echo PHP_EOL;                
    }
}
