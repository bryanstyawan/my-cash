<?=$this->load->view('templates/component');?>
<input type="hidden" id="crud">
<input type="hidden" id="oid">
<div id="view_data" class="card card card-default scrollspy">
	<div class="card-content">
		<a class="btn-floating waves-effect waves-effect waves-effect waves-light cyan right" onclick="openForm('add',0,0)">
			<i class="material-icons">add</i>
		</a>

		<a class="btn-floating waves-effect waves-effect waves-effect waves-light green right" onclick="openForm('reload',0,0)">
			<i class="material-icons">autorenew</i>
		</a>		
		<h4 class="card-title"><?=$title;?></h4>
		<div class="row">
			<div class="col s12">
				<textarea style="display: none;" id="dd-output-change"></textarea>
				<textarea style="display: none;" id="dd-output-raw"></textarea>
				<div class="dd drag_enabled" id="nestable3"></div>						
			</div>			
		</div>
	</div>
</div>
<div id="form_data" class="card card card-default scrollspy">
	<div class="card-panel">
		<a class="btn-floating waves-effect waves-light red right-align right" onclick="openForm('close',0,0)">
			<i class="material-icons">clear</i>
		</a>							
		<h4 class="card-title"><?=$title;?></h4>
		<h4 class="card-title" id="lbl_head_form"></h4>		
		<div class="row">
			<div class="col s12">	

				<div class="row">
					<div class="input-field col s12">
						<select id="f_parent" class="browser-default custom-select">
							<option value="0"> - - - - </option>	
						</select>
						<label class="active">Parent</label>
					</div>
				</div>										

				<div class="row">
					<div class="input-field col s12">
						<input placeholder="Index" class="clean-form" id="f_sort_number" type="text">
						<label for="f_sort_number" class="active">Index</label>
					</div>
				</div>				
						
				<div class="row">
					<div class="input-field col s12">
						<input placeholder="Nama" class="clean-form" id="f_name" type="text">
						<label for="f_name" class="active">Nama</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input placeholder="Route" class="clean-form" id="f_route" type="text">
						<label class="active">Route</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input placeholder="add" class="clean-form" id="f_icon" type="text">
						<label class="active">Icon [Materialize]</label>
					</div>
				</div>				

				<div class="row">
					<div class="input-field col s12">
					<button class="btn waves-effect waves-light right" id="btn-trigger-controll">
						Simpan
						<i class="material-icons right">send</i>
					</button>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>

<script>
	var res_json = [];
	var data_initial = {
		'f_name'       : '',
		'f_route'      : '',
		'f_icon'       : '',
		'f_parent'     : '',
		'f_sort_number': '', 
		'f_json'       : '',
		'crud'         : '',
		'oid'          : ''  
	}	
	var updateOutput = function(e)
	{
		var list   = e.length ? e : $(e.target),
			output = list.data('output');
		if (window.JSON) {
			output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
		} else {
			output.val('JSON browser support required for this demo.');
		}
	};
		
	$(document).ready(function(){
		$('#form_data').hide();	
			
		$('.dd').on('change', function() {
			/* on change event */
			updateOutput($('.dd').data('output', $('#dd-output-change')));
			
			var json_change = $("#dd-output-change").val();
			var json_raw = $("#dd-output-raw").val();
		});	

		$('#btn-trigger-controll').click(function() {
			var f_name        = $('#f_name').val();
			var f_route       = $('#f_route').val();
			var f_icon        = $('#f_icon').val();
			var f_parent      = $('#f_parent').val();
			var f_sort_number = $('#f_sort_number').val();

			var data_sender = {
				'f_name'       : f_name,
				'f_route'      : f_route,
				'f_icon'       : f_icon,
				'f_parent'     : f_parent,
				'f_sort_number': f_sort_number, 
				'f_json'       : '',
				'crud'         : $('#crud').val(),
				'oid'          : $('#oid').val()  
			}
			if (f_name <= 0) 
			{
				Notiflix.Notify.Failure('Nama harap diisi')
			}								
			else if(f_route == 0)
			{
				Notiflix.Notify.Failure('Route harap diisi')
			}
			else if(f_icon == 0)
			{
				Notiflix.Notify.Failure('Icon harap diisi')
			}
			else if(f_sort_number <= 0)
			{
				Notiflix.Notify.Failure('Index harap diisi')
			}
			else
			{
				sendData(data_sender)
			}
		})
	});	

	loadData('menus',0,0);
	loadData('select',0,0);	

	function loadData(arg,id,parent) 
	{
		state_process('before_send')		
		axios.post('<?=base_url();?>'+'config/menus/data/'+arg+'/'+id+'/'+parent)
		.then(function (response) 
		{
			if (response.status == 200) 
			{
				if (arg == 'menus') {					
					json = response.data;					
					$('.dd').nestable({ 
						json
					// })
					}).nestable('collapseAll');		

					updateOutput($('.dd').data('output', $('#dd-output')));
					updateOutput($('.dd').data('output', $('#dd-output-raw')));										
				}
				else if (arg == 'single')
				{
					obj = response.data.list[0];
					$('#oid').val(obj.id);
					$('#f_parent').val(obj.id_parent).change();					
					$('#f_name').val(obj.name);
					$('#f_route').val(obj.url);
					$('#f_sort_number').val(obj.sort_number);					
					$('#f_icon').val(obj.icon);
				}
				else if (arg == 'select')
				{
					_.forEach(response.data, function(res,index) 
					{					
						var _name     = res.name;
						_.forEach(res.detail, function(res1,index)
						{
							_name1 = ((res1.id_parent != 0) ? (res1.name_parent+' > '+res1.name) : res1.name);

							$('#'+_name).append($('<option>', { 
								value: res1.id,
								text : _name1
							}));
						})
					})					
				}
				state_process('after_send')				
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		})		
	}

	function sendData(data_sender) 
	{
		state_process('before_send')		
		axios.post('<?=base_url();?>'+'config/menus/store', data_sender)
		.then(function (response) 
		{
			if (response.status == 200) 
			{
				send_response(response,'report');
				if (response.data.status == true) 
				{
					openForm('close',0,0);
					open_main_route('config/menus/',0);
				}		
			}
		})
		.catch(function (error) 
		{
			send_response(error.response,'report');			
		});			
	}

	function openForm(arg,id,name) 
	{
		$('.clean-form').val('');
		if (arg == 'add') 
		{
			$('#view_data').hide();
			$('#lbl_head_form').html('Tambah data');
			$('#crud').val('insert');
			$('#form_data').show();			
		}
		else if (arg == 'edit') 
		{
			loadData('single',id,0);
			$('#view_data').hide();
			$('#lbl_head_form').html('Ubah data');
			$('#crud').val('update');			
			$('#form_data').show();			
		}		
		else if(arg == 'reload')
		{
			aside()
		}
		else if (arg == 'delete') 
		{
			Notiflix.Confirm.Show(
				'Hapus Data',
				'Anda yakin ingin hapus data ini ?',
				'Ya, Hapus data ini',
				'Tidak',
				function(){ 
					var data_sender     = data_initial;					
					data_sender['crud'] = 'delete';
					data_sender['oid']  = id;
					sendData(data_sender)
				},
				function(){}
			);
		}
		else if (arg == 'on') 
		{
			Notiflix.Confirm.Show(
				'Aktifkan data',
				'Anda yakin ingin aktifkan menu ini ?',
				'Ya, Hapus data ini',
				'Tidak',
				function(){ 
					var data_sender     = data_initial;					
					data_sender['crud'] = 'on';
					data_sender['oid']  = id;
					sendData(data_sender)
				},
				function(){}
			);			
		}
		else if (arg == 'off') 
		{
			Notiflix.Confirm.Show(
				'Matikan Menu',
				'Anda yakin ingin matikan menu ini ?',
				'Ya, Hapus data ini',
				'Tidak',
				function(){ 
					var data_sender     = data_initial;					
					data_sender['crud'] = 'off';
					data_sender['oid']  = id;
					sendData(data_sender)
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
