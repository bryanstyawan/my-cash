<?php
require APPPATH . 'database/Seeder.php';
class Tools extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // can only be called from the command line
		if (!$this->input->is_cli_request()) 
		{
            exit('Direct access is not allowed. This is a command line tool, use the terminal');
		}
		
        $this->load->dbforge();
		$this->faker = '';
    }

    public function message($to = 'World') {
        echo "Hello {$to}!" . PHP_EOL;
    }

	public function help() 
	{
        $result = "The following are the available command line interface commands\n\n";
        $result .= "php index.php tools migration \"file_name\"         				Create new migration file\n";
		$result .= "php index.php tools migrate    							 			Run all migrations. The version number is optional.\n";
		$result .= "php index.php tools migrate [\"version_number\"]    				Run all migrations. The version number is optional.\n";
		$result .= "php index.php tools migrateFresh    								Run all migrations. The version number is optional.\n";		
        $result .= "php index.php tools seeder \"file_name\"            				Creates a new seed file.\n";
		$result .= "php index.php tools loadSeeder              						Run all seeds file.\n";
		$result .= "php index.php tools createControlloer \"modules\" \"controller\"	Create new controller.\n";
		$result .= "php index.php tools createModel \"modules\" \"model\"				Create new model.\n";

        echo $result . PHP_EOL;
    }

	public function migration($name) 
	{
        $this->make_migration_file($name);
	}
	
	public function migrateFresh()
	{
		# code...
		$_DB = $this->db->database;
		$this->dbforge->drop_database($_DB);		
		$this->dbforge->create_database($_DB);		
		echo "Fresh migration run successfully" . PHP_EOL;		
	}	

    public function migrate($version = null) {
        $this->load->library('migration');

        if ($version != null) {
            if ($this->migration->version($version) === FALSE) {
                show_error($this->migration->error_string());
            } else {
                echo "Migrations run successfully" . PHP_EOL;
            }

            return;
        }

        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migrations run successfully" . PHP_EOL;
        }
    }

    public function seeder($name) {
        $this->make_seed_file($name);
    }
	
    public function loadSeeder() {
        $seeder = new Seeder();

        $seeder->call('loadSeeder');
    }	

	protected function make_migration_file($name) 
	{
        $date 			= new DateTime();
        $timestamp 		= $date->format('YmdHis');

        $table_name 	= strtolower($name);
        $path 			= APPPATH . "database/migrations/$timestamp" . "_" . "$name.php";
        $my_migration 	= fopen($path, "w") or die("Unable to create migration file!");

		$migration_template = "<?php

class Migration_$name extends CI_Migration {

    public function up() {
        \$this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
			),
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
			),
			'is_delete' => array(
				'type' => 'INT',
				'constraint' => 11
			)			
        ));
        \$this->dbforge->add_key('id', TRUE);
        \$this->dbforge->create_table('$table_name');
    }

    public function down() {
        \$this->dbforge->drop_table('$table_name');
    }

}";

        fwrite($my_migration, $migration_template);

        fclose($my_migration);

        echo "$path migration has successfully been created." . PHP_EOL;
    }

    protected function make_seed_file($name) {
        $path = APPPATH . "database/seeds/$name.php";

        $my_seed = fopen($path, "w") or die("Unable to create seed file!");

        $seed_template = "<?php

class $name extends Seeder {

    private \$table = '$name';

    public function run() {
        \$this->db->truncate(\$this->table);

        //seed records manually
        \$data = [
            'user_name' => 'admin',
            'password' => '9871'
        ];
        \$this->db->insert(\$this->table, \$data);

        //seed many records using faker
        \$limit = 33;
        echo \"seeding \$limit user accounts\";

        for (\$i = 0; \$i < \$limit; \$i++) {
            echo \".\";

            \$data = array(
                'user_name' => \$this->faker->unique()->userName,
                'password' => '1234',
            );

            \$this->db->insert(\$this->table, \$data);
        }

        echo PHP_EOL;
    }
}
";

        fwrite($my_seed, $seed_template);

        fclose($my_seed);

        echo "$path seeder has successfully been created." . PHP_EOL;
	}
	
	public function createController($module,$name) 
	{
		$this->make_controller_file($module,$name);
	}	

	protected function make_controller_file($module,$name) 
	{
		if(!is_dir(APPPATH . "modules/".$module))
		{
			mkdir(APPPATH . "modules/".$module, 0755);
			mkdir(APPPATH . "modules/".$module."/controllers", 0755);
			mkdir(APPPATH . "modules/".$module."/models", 0755);
			mkdir(APPPATH . "modules/".$module."/views", 0755);									
		}

		$path = APPPATH . "modules/$module/controllers/$name.php";
	
		$my_model = fopen($path, "w") or die("Unable to create model file!");
	
		$model_template = "<?php defined('BASEPATH') OR exit('No direct script access allowed');
class $name extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	private \$data = [];

	public function index()
	{
		\$this->data['title']	= 'Judul disesuaikan';//Judul
		\$view			= \$this->load->view('dashboard/soon/index',\$this->data);
		return \$view;
	}	

	public function data(\$arg,\$id)
	{
		# code...
		if (\$arg == 'table') {
			# code...
			\$this->data['list'] = \$this->Stores->get('nama_table')->result_array();			
		}
		else
		{
			\$this->data['list'] = \$this->Stores->getWhere('nama_table',array('AND'=>array('id'=>\$id)))->result_array();			
		}

		echo json_encode(\$this->data);		
	}
	
	public function store()
	{
		# code...
		\$text_status = '';
		\$res_data	  = '';
		\$requestData = \$this->Globals->requestData();		
		\$data_sender = array
		(
			'name' 		=> \$requestData['f_name'],
			'crud' 		=> \$requestData['crud'],
			'oid'		=> \$requestData['oid'], 
		);
		
		\$data_store = \$this->Globals->logStore(\$data_sender['crud']);
		if (\$data_store != 0) {
			if (\$data_sender['crud'] == 'insert') 
			{
				# code...
				\$checkData = \$this->Stores->getWhere('fdn_category_expenses',array('AND'=>array('name' => \$data_sender['name'])))->result_array();
				if (\$checkData == array()) {
					# code...
					\$data_store['name']     = \$data_sender['name'];
					\$data_store['status'] 	 = 1;
					\$res_data                = \$this->Stores->insert('fdn_category_expenses',\$data_store);
					\$text_status             = \$this->Stores->status(\$res_data,'Your data has been successfully saved.');				
				}
				else
				{
					\$res_data = false;
					\$text_status = 'Failed to save data, data already exists.';				
				}
			}
			elseif (\$data_sender['crud'] == 'update') {
				# code...
				\$data_store['name']     = \$data_sender['name'];
				\$res_data                = \$this->Stores->update('fdn_category_expenses',\$data_store,array('id' => \$data_sender['oid']));
				\$text_status             = \$this->Stores->status(\$res_data,'Your data has been successfully updated.');							
			}
			elseif (\$data_sender['crud'] == 'delete') {
				# code...
				\$data_store['status']    = 4;			
				\$res_data                = \$this->Stores->update('fdn_category_expenses',\$data_store,array('id' => \$data_sender['oid']));
				\$text_status             = \$this->Stores->status(\$res_data,'Your data has been successfully deleted.');				
			}						
		}
		else
		{
			\$res_data    = 'logoff';
			\$text_status = 'Im sorry, your session has been expired.';			
		}				
		
		\$res = array
					(
						'status' => \$res_data,
						'text'   => \$text_status
					);
		echo json_encode(\$res);		
	}	
}
		";
	
		fwrite($my_model, $model_template);
	
		fclose($my_model);
	
		echo "$path controller has successfully been created." . PHP_EOL;
	}	

	public function createModel($module,$name) {
		$this->make_model_file($module,$name);
	}	

	protected function make_model_file($module,$name) 
	{
		if(!is_dir(APPPATH . "modules/".$module))
		{
			mkdir(APPPATH . "modules/".$module, 0755);
			mkdir(APPPATH . "modules/".$module."/controllers", 0755);
			mkdir(APPPATH . "modules/".$module."/models", 0755);
			mkdir(APPPATH . "modules/".$module."/views", 0755);									
		}

		$path = APPPATH . "modules/$module/models/$name.php";
	
		$my_model = fopen($path, "w") or die("Unable to create model file!");
	
		$model_template = "<?php
class $name extends CI_Model
{
	public function __construct () {
		parent::__construct();
	}

	public function example()
	{
		// code...
		\$sql = \"SELECT DISTINCT a.*,
						COALESCE(
							(
								SELECT count(aa.id_menu) as counter
								FROM config_menu aa
								WHERE aa.id_parent = a.id_menu
							),'-'
						) as child
				FROM config_menu a
				WHERE a.id_parent = '\".\$id.\"'
				ORDER BY a.flag DESC, a.prioritas ASC\";
		\$query = \$this->db->query(\$sql);
		if(\$query->num_rows() > 0)
		{
			return \$query->result();
		}
		else
		{
			return 0;
		}
	}
}
		";
	
		fwrite($my_model, $model_template);
	
		fclose($my_model);
	
		echo "$path model has successfully been created." . PHP_EOL;
	}	

	public function createViews($module,$folder,$name) 
	{
		$this->make_views_file($module,$folder,$name);
	}	

	protected function make_views_file($module,$folder,$name)
	{
		if(!is_dir(APPPATH . "modules/".$module))
		{
			mkdir(APPPATH . "modules/".$module, 0755);
			mkdir(APPPATH . "modules/".$module."/controllers", 0755);
			mkdir(APPPATH . "modules/".$module."/models", 0755);
			mkdir(APPPATH . "modules/".$module."/views", 0755);									
		}

		if(!is_dir(APPPATH . "modules/".$module."/views/".$folder))
		{
			mkdir(APPPATH . "modules/".$module."/views/".$folder, 0755);									
		}		

		$path = APPPATH . "modules/$module/views/$folder/$name.php";
		$my_views = fopen($path, "w") or die("Unable to create model file!");		
		$views_template = "<?=\$this->load->view('templates/component');?>
<div id=\"view_data\" class=\"card card card-default scrollspy\">
	<div class=\"card-content\">
		<div id=\"btn_add\"></div>
		<h4 class=\"card-title\"><?=\$title;?></h4>
		<div class=\"row\">
			<div class=\"col s12 dataTables_scrollBody\">
				<table id=\"table-store\" class=\"table-view display dataTable dtr-inline\">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id=\"form_data\" class=\"card card card-default scrollspy\">
	<div class=\"card-panel\">
		<a class=\"btn-floating waves-effect waves-light red right-align right\" onclick=\"openForm('close',0,0)\">
			<i class=\"material-icons\">clear</i>
		</a>							
		<h4 class=\"card-title left\" style=\"margin-right: 10px;\"><?=\$title;?></h4>
		<h4 class=\"card-title\" id=\"lbl_head_form\"></h4>		
		<div class=\"row\">
			<div class=\"col s12\">				
				<div class=\"row\">
					<div class=\"input-field col s12\">
						<input placeholder=\"Nama\" class=\"clean-form\" id=\"f_name\" type=\"text\">
						<label for=\"f_name\" class=\"active\">Name</label>
					</div>
				</div>

				<div class=\"row\">
					<div class=\"input-field col s12\">
					<button class=\"btn waves-effect waves-light right\" id=\"btn-trigger-controll\">
						Save Data
						<i class=\"material-icons right\">send</i>
					</button>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>

<script>
	var state = {
		'res_json' : [],
		'data_rules' : rules_module,
		'data' : {
			'f_name' : '',
			'crud' 	 : '',
			'oid' 	 : ''			
		},
		'dom' : {
			'insert' : ''
		}
	};

	loadData('table',0);
	(state.data_rules.create == 1) ? $('#btn_add').html(loadButton('btn','add','add',0,0,'Tambah','btn-floating waves-effect waves-effect waves-effect waves-light cyan right')) : '' ;	
	$(document).ready(function(){
		$('#form_data').hide();

		$('#btn-trigger-controll').click(function() {
			state.data.f_name = $('#f_name').val()
			if (state.data.f_name.length <= 0) 
			{
				Notiflix.Notify.Failure(' Jenis Jabatan harap diisi')
			}								
			else
			{
				sendData(state.data)
			}
		})
	});	

	function loadData(arg,id) 
	{
		state_process('before_send')
		axios.post('<?=base_url();?>'+'fondation/expenses/data/'+arg+'/'+id)
		.then(function (response) 
		{
			if (response.status == 200) 
			{
				if (arg == 'table') 
				{
					state.dom.insert = '';
					destroyTable('table-store');					
					_.forEach(response.data.list, function(res,index) 
					{
						state.dom.insert += '<tr>'+
											'<td>'+(index+1)+'</td>'+
											'<td>'+res.name+'</td>'+
											'<td>'+
												((state.data_rules.update == 1) ? loadButton('btn','edit','edit',res.id,res.nama_jenisjabatan,'Edit Data','default_class') : '') +
												((state.data_rules.delete == 1) ? loadButton('btn','delete','delete',res.id,res.nama_jenisjabatan,'Delete Data','default_class') : '') +																						
											'</td>'+																				
									'</tr>';
					});
					$('#table-store tbody').html(state.dom.insert);
					$('#table-store').dataTable();					
				}
				else if(arg == 'single')
				{
					var obj = response.data.list[0];
					state.data.oid = obj.id;											
					$('#f_name').val(obj.name);
				}
				state_process('after_send')				
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		})		
	}

	function sendData(data_sender) {
		state_process('before_send')		
		axios.post('<?=base_url();?>'+'fondation/expenses/store', data_sender)
		.then(function (response) {
			send_response(response,'report');
			if (response.data.status == true) {					
				$('.clean-form').val('');					
				openForm('close',0,0)
				loadData('table',0);
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		});			
	}

	function openForm(arg,id,name) 
	{
		$('.clean-form').val('');		
		if (arg == 'add') 
		{
			state.data.crud = 'insert';			
			$('#view_data').hide();
			$('#lbl_head_form').html(' > Add data');
			$('#form_data').show();			
		}
		else if (arg == 'edit') 
		{
			state.data.crud = 'update';			
			loadData('single',id);						
			$('#view_data').hide();
			$('#lbl_head_form').html(' > Edit data');
			$('#form_data').show();			
		}		
		else if (arg == 'delete') 
		{
			Notiflix.Confirm.Show(
				'Delete Data',
				'Do you really want to delete these data ?',
				'Yes, Delete these data',
				'No',
				function(){ 
					state.data.crud = 'delete';
					state.data.oid = id;										
					sendData(state.data)
				},
				function(){}
			);
		}
		else if (arg == 'close')
		{
			$('#view_data').show();
			$('#form_data').hide();			
		}
	}
</script>		
";

		fwrite($my_views, $views_template);
	
		fclose($my_views);
	
		echo "$path views has successfully been created." . PHP_EOL;		
	}
}
