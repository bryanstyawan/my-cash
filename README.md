______________________________________
Dependency
______________________________________

	1. 	Composer [Min v.1.8.6]
	2. 	Node [Min v.10.16.0] + npm [Min v.6.9.0]
	3. 	Browserify

______________________________________
Instalasi
______________________________________
	1. 	composer install
	2. 	npm install
	3. 	Ubah config database dan base url nya
		config database = config/database	-> sesuaikan dengan database yang dibuat
		config base_url = config/config		-> http://localhost/nama_folder_yang_dibuat
	4.	buat database baru terlebih dahulu
	5.	php index.php tools migrate
	6.	php index.php tools LoadSeeder
	7. 	browserify main.js -o bundle.js
______________________________________
Migrate database
______________________________________


1. 	Buat migration baru
	
	php index.php tools migration "file_name"
	contoh
		php index.php tools migration "Mr_agama"

		perintah ini akan membuat file untuk membuat table baru, 
		merubah field atau menghapus field yang ada.
		letak file ada di application/database/migration

	Jika ada perubahan atau penambahan field, lebih baik buat migration baru.
	Akan banyak file migration tidak masalah.

	untuk contoh, lihat dari yang sudah ada atau 
	lebih lengkap lihat disini = https://codeigniter.com/user_guide/database/forge.html

2.	Eksekusi migration yang telah dibuat.
	
	php index.php tools migrate

3.	Membuat seeder baru

	php index.php tools seeder "file_name"
	contoh		
		php index.php tools seeder "Mr_agama"

		perintah ini akan membuat file untuk 
		membuat data dummy atau data asli.
	
	setelah membuat file seeder baru, daftar file seedernya 
	ke dalam file seeder LoadSeeder

4.	Eksekusi seeder
	
	Sebelum Eksekusi seeder, pertama kali harus mendaftarkan seedernya terlebih dahulu
	di file loadSeeder (database/seeds/loadSeeder)

	contoh	

		$this->call('config_groups');
		$this->call('mr_pegawai');

		Ketika ingin menambahkan seeder mr_agama, maka akan menjadi seperti dibawah ini.

		$this->call('config_groups');
		$this->call('mr_pegawai');
		$this->call('mr_agama');

		jika ingin lakukan seeder secara spesifik, cukup lakukan comment pada perintahnya. 		

		$this->call('config_groups');
		//$this->call('mr_pegawai');
		$this->call('mr_agama');


	Jika sudah config loadSeeder, lakukan perintah dibawah ini

	php index.php tools loadSeeder 

______________________________________
Fresh Migrate database
______________________________________	

	php index.php tools migrateFresh

	perintah ini untuk mendapatkan migrate yang Fresh
	
	*	tidak direkomendasikan ketika aplikasi sudah didalam lingkungan production,
		perintah ini hanya dilakukan ketika dalam development

______________________________________
Generate Controller + modul
______________________________________

php index.php tools createController "nama_module" "nama_controller"

contoh
	php index.php tools createController master Mr_agama


______________________________________
Generate model + modul
______________________________________

php index.php tools createModel "nama_module" "nama_model"

contoh
	php index.php tools createModel master Magama

______________________________________
Generate views
______________________________________

php index.php tools createViews "nama_module" "folder" "nama_file"

contoh
	php index.php tools createViews master agama index

______________________________________
Field wajib di setiap table
______________________________________


	'created_by_nip' => array(
		'type' => 'VARCHAR',
		'constraint' => 100
	),
	'updated_by_nip' => array(
		'type' => 'VARCHAR',
		'constraint' => 100
	),			
	'date_created' => array(
		'type' => 'DATE',
		'constraint' => NULL
	),
	'date_updated' => array(
		'type' => 'DATE',
		'constraint' => NULL				
	)

	field ini untuk identitas data. jadi tau siapa yang menambah, merubah data.
