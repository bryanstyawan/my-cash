<?php

class Config_menus extends Seeder {

    private $table = 'Config_menus';

    public function run() {
        $this->db->truncate($this->table);

        //seed records manually
		$data_seeds = 
		[
			[
				'name'	=> 'Dashboard',
				'url'	=> 'dashboard/ajax_home/',
				'icon'	=> '',
				'child' => array()
			],
			[
				'name'	=> 'Internal',
				'url'	=> '#',
				'icon'	=> '',
				'child' => [
					[
						'name'	=> 'Project Management',
						'url'	=> 'dashboard/ajax_home/',
						'icon'	=> '',
						'child' => array()
					]					
				]
			],			
			[
				'name'	=> 'Config',
				'url'	=> 'dashboard/ajax_home/',
				'icon'	=> '',				
				'child' => [					
					[
						'name'	=> 'Menu & Submenu',
						'url'	=> 'config/menus',
						'icon'	=> '',						
						'child' => array()
					],
					[
						'name'	=> 'Groups',
						'url'	=> 'config/groups/',
						'icon'	=> '',						
						'child' => array()
					],					
					[
						'name'	=> 'Permissions',
						'url'	=> 'config/permissions/data',
						'icon'	=> '',						
						'child' => array()
					],					
					[
						'name'	=> 'Slider',
						'url'	=> 'config/slider/data',
						'icon'	=> '',						
						'child' => array()
					]																				
				]
			],			
			[
				'name'	=> 'Master',
				'url'	=> '#',
				'icon'	=> '',				
				'child'	=> [
					[
						'name'	=> 'Organisasi',
						'url'	=> '#',
						'icon'	=> '',						
						'child'	=> [
							[
								'name'	=> 'Grade',
								'url'	=> 'master/grade/data',
								'icon'	=> '',								
								'child' => array()					
							],
							[
								'name'	=> 'Pangkat/Golongan',
								'url'	=> 'master/pangkat/data',
								'icon'	=> '',								
								'child' => array()					
							],														
							[
								'name'	=> 'Struktur Organisasi',
								'url'	=> 'master/struktur_organisasi/data',
								'icon'	=> '',								
								'child' => array()					
							],
						]
					],
					[
						'name'	=> 'Pendidikan',
						'url'	=> '#',
						'icon'	=> '',	
						'child'	=> [
							[
								'name'	=> 'Akademik',
								'url'	=> 'master/akademik',
								'icon'	=> '',								
								'child' => array()					
							],
							[
								'name'	=> 'Jurusan/Fakultas',
								'url'	=> 'master/jurusan/data',
								'icon'	=> '',								
								'child' => array()					
							]
						]
					],					
					[
						'name'	=> 'Pegawai',
						'url'	=> 'master/pegawai/data',
						'icon'	=> '',						
						'child' => array()					
					],
					[
						'name'	=> 'Agama',
						'url'	=> 'master/agama/data',
						'icon'	=> '',						
						'child' => array()					
					],
					[
						'name'	=> 'Tugas Belajar',
						'url'	=> 'master/tugas_belajar/data',
						'icon'	=> '',						
						'child' => array()					
					],
					[
						'name'	=> 'Tunjangan Profesi',
						'url'	=> 'master/tunjangan_profesi/data',
						'icon'	=> '',						
						'child' => array()					
					]
				]
			]	
		];

		$lines = file(APPPATH . 'database/sql/config_menus.sql');
		$this->Globals->importSqlFromFile($lines,$this->table);
		echo "\n";		

		$get_data = $this->Stores->get('config_menus',5)->result_array();
		$get_data = ($get_data == array()) ? 0 : count($get_data) ;

		if ($get_data == 0) {
			# code...
			echo "===============================================================================";			
			echo "\n";
			echo "Manual Seeding";
			echo "\n";
			echo "===============================================================================";						
			echo "\n";			
			foreach ($data_seeds as $key) {
				# code...
				echo "\n";
				echo $key['name'];			
				$data = array
				(
					'name' 				=> $key['name'],
					'url'				=> $key['url'],
					'icon'				=> $key['icon'],
					'status'			=> 1,
					'created_by_nip'	=> 'system',
					'date_created'		=> date('Y-m-d')
				);
				
				$res = $this->Stores->insertAndGetId($this->table,$data);
				if (count($key['child']) != 0) {
					# code...
					foreach ($key['child'] as $key1) {
						# code...
						echo "\n";
						echo $key1['name'];					
						$data1 = array
						(
							'name' 				=> $key1['name'],
							'url'				=> $key1['url'],
							'icon'				=> $key1['icon'],							
							'id_parent'			=> $res,
							'status'			=> 1,							
							'created_by_nip'	=> 'system',
							'date_created'		=> date('Y-m-d')
						);
						$res1 = $this->Stores->insertAndGetId($this->table,$data1);
						if (count($key1['child'])) {
							# code...
							foreach ($key1['child'] as $key2) {
								# code...
								$data2 = array
								(
									'name' 				=> $key2['name'],
									'url'				=> $key2['url'],
									'icon'				=> $key2['icon'],									
									'id_parent'			=> $res1,
									'status'			=> 1,									
									'created_by_nip'	=> 'system',
									'date_created'		=> date('Y-m-d')
								);
								$res2 = $this->Stores->insertAndGetId($this->table,$data2);							
								echo "\n";
								echo $key2['name'];							
							}
						}
					}
				}			
			}
			echo "\n";			
		}

		echo "Table menu & submenu selesai";		
        echo PHP_EOL;
    }
}
