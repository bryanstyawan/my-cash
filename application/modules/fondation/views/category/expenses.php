<?=$this->load->view('templates/component');?>
<div id="view_data" class="card card card-default scrollspy">
	<div class="card-content">
		<div id="btn_add"></div>
		<h4 class="card-title"><?=$title;?></h4>
		<div class="row">
			<div class="col s12 dataTables_scrollBody">
				<table id="table-store" class="table-view display dataTable dtr-inline">
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
<div id="form_data" class="card card card-default scrollspy">
	<div class="card-panel">
		<a class="btn-floating waves-effect waves-light red right-align right" onclick="openForm('close',0,0)">
			<i class="material-icons">clear</i>
		</a>							
		<h4 class="card-title left" style="margin-right: 10px;"><?=$title;?></h4>
		<h4 class="card-title" id="lbl_head_form"></h4>		
		<div class="row">
			<div class="col s12">				
				<div class="row">
					<div class="input-field col s12">
						<input placeholder="Nama" class="clean-form" id="f_name" type="text">
						<label for="f_name" class="active">Name</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
					<button class="btn waves-effect waves-light right" id="btn-trigger-controll">
						Save Data
						<i class="material-icons right">send</i>
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
				Notiflix.Notify.Failure('')
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
		axios.post('<?=base_url();?>'+'fondation/category_expenses/data/'+arg+'/'+id)
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
		axios.post('<?=base_url();?>'+'fondation/category_expenses/store', data_sender)
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
