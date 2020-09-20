<?=$this->load->view('templates/component');?>
		<input type="hidden" id="crud">
		<input type="hidden" id="oid">
		<div id="view_data" class="card card card-default scrollspy">
			<div class="card-content">
				<a class="btn-floating waves-effect waves-effect waves-effect waves-light cyan right" id="btn_add" onclick="openForm('add',0,0)">
					<i class="material-icons">add</i>
				</a>			
				<h4 class="card-title"><?=$title;?></h4>
				<div class="row">
					<div class="col s12 dataTables_scrollBody">
						<table id="table-store" class="table-view display dataTable dtr-inline">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Aksi</th>
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
				<h4 class="card-title"><?=$title;?></h4>
				<h4 class="card-title" id="lbl_head_form"></h4>		
				<div class="row">
					<div class="col s12">				
						<div class="row">
							<div class="input-field col s12">
								<input placeholder="Nama" class="clean-form" id="f_name" type="text">
								<label for="f_name" class="active">Nama</label>
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
			var data_rules = rules_module;
			(data_rules.create == 1) ? $('#btn_add').show() : $('#btn_add').hide() ;	
			var data_initial = 
			{
				'f_name' : '',
				'crud' 	 : '',
				'oid' 	 : ''  
			}
		
			$(document).ready(function(){
				$('#form_data').hide();
		
				$('#btn-trigger-controll').click(function() {
					var f_name = $('#f_name').val();
		
					var data_sender = {
						'f_name' : f_name,
						'crud' 	 : $('#crud').val(),
						'oid' 	 : $('#oid').val()  
					}
					if (f_name <= 0) 
					{
						Notiflix.Notify.Failure(' Jenis Jabatan harap diisi')
					}								
					else
					{
						sendData(data_sender)
					}
				})
			});	
		
			loadData('table',0);
		
			function loadData(arg,id) 
			{
				state_process('before_send')
				axios.post('<?=base_url();?>'+'master/jenis_jabatan/data/'+arg+'/'+id)
				.then(function (response) 
				{
					if (response.status == 200) 
					{
						if (arg == 'table') 
						{
							var tr_insert = '';
							destroyTable('table-store');					
							_.forEach(response.data.list, function(res,index) 
							{
								tr_insert += '<tr>'+
													'<td>'+(index+1)+'</td>'+
													'<td>'+res.nama_jenisjabatan+'</td>'+
													'<td>'+
														((data_rules.update == 1) ? loadButton('btn','edit','edit',res.id,res.nama_jenisjabatan,'','default_class') : '') +
														((data_rules.delete == 1) ? loadButton('btn','delete','delete',res.id,res.nama_jenisjabatan,'','default_class') : '') +																						
													'</td>'+																				
											'</tr>';
							});
							$('#table-store tbody').html(tr_insert);
							$('#table-store').dataTable();					
						}
						else if(arg == 'single')
						{
							var obj = response.data.list[0];
							$('#oid').val(obj.id);
							$('#f_name').val(obj.nama_jenisjabatan);
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
				axios.post('<?=base_url();?>'+'master/jenis_jabatan/store', data_sender)
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
					$('#view_data').hide();
					$('#lbl_head_form').html('Tambah data');
					$('#crud').val('insert');
					$('#form_data').show();			
				}
				else if (arg == 'edit') 
				{
					loadData('single',id);
					$('#view_data').hide();
					$('#lbl_head_form').html('Ubah data');
					$('#crud').val('update');			
					$('#form_data').show();			
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
				else if (arg == 'close')
				{
					$('#view_data').show();
					$('#form_data').hide();			
				}
			}
		</script>
		