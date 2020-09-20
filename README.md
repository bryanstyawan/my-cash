______________________________________
Instalasi
______________________________________
1. 	Composer [Min v.1.8.6]
	composer -v
2. 	node [Min v.10.16.0] + npm [Min ]
	node -v
	npm -v
3. git


Setelah semua sudah diinstall, ikuti langkah dibawah ini.

a. 	composer install (Setiap ada perubahan di file Composer.json)
b. 	npm i / npm install (Setiap ada perubahan di file package-lock.json / package.json)
c. 	Ubah config database dan base url nya
 	config database = config/database	-> sesuaikan dengan database yang dibuat
	config base_url = config/config		-> http://localhost/nama_folder_yang_dibuat
d.	buat database baru terlebih dahulu
e.	php index.php tools migrate
f.	php index.php tools LoadSeeder

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
Git Store
______________________________________
1. 	git pull origin master atau git pull origin dev1
2. 	git push origin [branch masing masing]
3. 	git checkout [branch masing masing]
	contoh
	git checkout dev5

-------
1. git commit -m "remarks"
2. git push origin [branch masing masing]


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
Framework CSS + JS (Assets), Web package, PHP package
______________________________________
Materialize
	Lihat dokumentasinya disini yah
	https://materializecss.com/


NPM
	Semua web package seperti jquery, datatables dll dikendalikan oleh npm. 
	npm digunakan untuk installasi component web + kontrol version yang digunakan.

	Jika ada penambahan component lakukan seperti dibawah ini

		npm install nama_package
		contoh
		npm install datatables

	untuk melihat seluruh paket yang tersedia

		npm view nama_package version
		contoh
		npm view datatables version

	untuk menambahkan web package berdasarkan versionnya

		npm install nama_package@[version]
		contoh
		npm install nama_package@1.10.18


	Jika ada perubahan didalam file package-lock.json atau package.json
	lakukan perintah dibawah ini

		npm install 
		atau
		npm i 

	[Warning]
		Jangan pernah lakukan perintah
			- npm audit fix (dan sejenisnya)
			- npm update
		Dikhawatirkan library ada yang gak jalan. 

Composer
	Semua PHP package dikendalikan oleh composer

	Jika ada perubahan didalam file composer.lock atau composer.json
	lakukan perintah dibawah ini	

		composer install

browserify
	Pertama install dulu browserify
	npm install -g browserify
	
	setelah itu jalan perintah dibawah ini
	browserify main.js -o bundle.js

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
