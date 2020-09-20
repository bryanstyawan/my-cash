<?=$this->load->view('templates/component');?>
<input type="hidden" id="crud">
<input type="hidden" id="oid">
<div id="view_data" class="card card card-default scrollspy">
	<div class="card-content">	
		<h4 class="card-title"><?=$title;?></h4>
	
		<div class="row">
			<div class="col s12">				
				<div class="input-field col s6">
					<input placeholder="NIP" id="f_nip_fb" type="text">
					<label for="f_nip_fb" class="active">NIP</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="Nama" id="f_nama_fb" type="text">
					<label for="f_nama_fb" class="active">Nama</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="TTL" id="f_ttl_fb" type="text">
					<label for="f_ttl_fb" class="active">Tempat,Tanggal Lahir</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="Agama" id="f_agama_fb" type="text">
					<label for="f_agama_fb" class="active">Agama</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="Pangkat" id="f_pangkat_fb" type="text">
					<label for="f_pangkat_fb" class="active">Pangkat</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="Nama Golongan" id="f_nagol_fb" type="text">
					<label for="f_nagol_fb" class="active">Nama Golongan</label>
				</div>
				
				<div class="input-field col s6">
					<input placeholder="Tmt Pangkat" class="form-control datepicker" id="f_tmt_fb" >
					<label for="f_tmt_fb" class="active">TMT Pangkat</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="Pendidikan" id="f_pendidikan_fb" type="text">
					<label for="f_pendidikan_fb" class="active">Pendidikan</label>
				</div>

				<div class="input-field col s12">
					<input placeholder="Jabatan" id="f_jabatan_fb" type="text">
					<label for="f_jabatan_fb" class="active">Jabatan</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="Tmt Jabatan" class="form-control datepicker" id="f_tmtj_fb" >
					<label for="f_tmtj_fb" class="active">TMT Jabatan</label>
				</div>

				<div class="input-field col s12">
					<input placeholder="Alamat 1" id="f_alamat1_fb" type="text">
					<label for="f_alamat1_fb" class="active">Alamat 1</label>
				</div>

				<div class="input-field col s12">
					<input placeholder="Alamat 2" id="f_alamat2_fb" type="text">
					<label for="f_alamat2_fb" class="active">Alamat 2</label>
				</div>

				<div class="input-field col s12">
					<input placeholder="Unit Kerja" id="f_unit_fb" type="text">
					<label for="f_unit_fb" class="active">Unit Kerja</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="No Hp" id="f_nohp_fb" type="text">
					<label for="f_nohp_fb" class="active">No Hp</label>
				</div>

				<div class="input-field col s6">
					<input placeholder="Email" id="f_email_fb" type="text">
					<label for="f_email_fb" class="active">Email</label>
				</div>
			</div>
		</div>

		<div class="row">
			<ul class="tabs tabs-fixed-width z-depth-1">
				<li class="tab">
					<a class="pendidikan" id="t_pendidikan" href="#tabs_pendidikan">
						Pendidikan
						<i class="material-icons">school</i>					
					</a>
				</li>
				<li class="tab">
					<a id="t_pangkat" href="#tabs_pangkat">
						Pangkat
						<i class="material-icons">grade</i>																
					</a>
				</li>	
				<li class="tab">
					<a id="t_jabatan" href="#tabs_jabatan">
						Jabatan
						<i class="material-icons">assistant</i>															
					</a>
				</li>			
			</ul>
			<div id="tabs_pendidikan" class="col s12">
				<h4 class="flow-text">Pendidikan</h4>
				<div class="col s12 dataTables_scrollBody">
					<table id="table-store-pendidikan" class="table-view display dataTable dtr-inline">
					<?=$this->load->view('core/profile/table_pendidikan');?>
					</table>
				</div>
			</div>
			<div id="tabs_pangkat" class="col s12">
				<h4 class="flow-text">Pangkat</h4>				
				<div class="col s12 dataTables_scrollBody">
					<table id="table-store-pangkat" class="table-view display dataTable dtr-inline">
					<?=$this->load->view('core/profile/table_pangkat');?>
					</table>
				</div>			
			</div>
			<div id="tabs_jabatan" class="col s12">
				<h4 class="flow-text">Jabatan</h4>				
				<div class="col s12 dataTables_scrollBody">
					<table id="table-store-jabatan" class="table-view display dataTable dtr-inline">
					<?=$this->load->view('core/profile/table_jabatan');?>
					</table>
				</div>			
			</div>
		</div>
	</div>
</div>

<script>
	var res_json = [];
	var data_initial = {
		'crud' 	 			: '',
		'oid' 	 			: '',
	}

	$(document).ready(function(){
		$('.tabs').tabs();
	});	

	id= "<?=$this->session->userdata('sesNip')?>"
	loadData('api_profile',id,0);
	loadData('api_jabatan',id,0);
	loadData('api_pangkat',id,0);
	loadData('api_pendidikan',id,0);

	function loadData(arg,id,id1) 
	{
		var obj = '';
		var tr_insert = '';
		state_process('before_send')
		axios.post('<?=base_url();?>'+'master/pegawai/data/'+arg+"/"+id+"/"+0)
		.then(function (response)
		{
			if (response.status == 200) 
			{
				if (arg == 'api_jabatan')
				{
					obj = jQuery.parseJSON (response.data.list);
					obj = obj.results;
					destroyTable('table-store-jabatan');					
					_.forEach(obj, function(res,index) 
					{
						tr_insert += '<tr>'+
											'<td>'+(index+1)+'</td>'+
											'<td>'+res.jataban+'</td>'+
											'<td>'+res.jenisjab+'</td>'+
											'<td>'+res.tmt_jabatan+'</td>'+																				
									'</tr>';
					});
					$("#table-store-jabatan tbody").html(tr_insert);
					$("#table-store-jabatan").dataTable();									
				}
				else if(arg == 'api_pendidikan')
				{
					obj = jQuery.parseJSON (response.data.list);
				 	obj = obj.results;
					destroyTable('table-store-pendidikan');					
					_.forEach(obj, function(res,index) 
					{
						tr_insert += '<tr>'+
											'<td>'+(index+1)+'</td>'+
											'<td>'+res.nsek+'</td>'+
											'<td>'+res.ntpu+'</td>'+
											'<td>'+res.njur+'</td>'+
											'<td>'+res.tempat+'</td>'+
											'<td>'+res.thnlulus+'</td>'+																				
									'</tr>';
					});
					$("#table-store-pendidikan tbody").html(tr_insert);
					$("#table-store-pendidikan").dataTable();
										
				}
				else if(arg == 'api_pangkat')
				{
					obj = jQuery.parseJSON (response.data.list);
				 	obj = obj.results;
					destroyTable('table-store-pangkat');					
					_.forEach(obj, function(res,index) 
					{
						tr_insert += '<tr>'+
											'<td>'+(index+1)+'</td>'+
											'<td>'+res.pangkat+'</td>'+
											'<td>'+res.nama_gol+'</td>'+
											'<td>'+res.tmt_pangkat+'</td>'+																				
									'</tr>';
					});
					$("#table-store-pangkat tbody").html(tr_insert);
					$("#table-store-pangkat").dataTable();
										
				}
				else if ( arg == 'api_profile')
				{
					obj = jQuery.parseJSON (response.data.list);
				 	obj = obj.results;
					$("#oid").val(obj.nip);
					$("#f_nip_fb").val(obj.nip);					
					$("#f_nama_fb").val(obj.nama);					
					$("#f_ttl_fb").val(obj.ttl);
					$("#f_agama_fb").val(obj.agama);	
					$("#f_pangkat_fb").val(obj.pangkat);
					$("#f_nagol_fb").val(obj.nama_gol);
					$("#f_tmt_fb").val(obj.tmtpang);
					$("#f_pendidikan_fb").val(obj.pendidikan);
					$("#f_jabatan_fb").val(obj.jabatan);
					$("#f_tmtj_fb").val(obj.tmtjabatan);
					$("#f_alamat1_fb").val(obj.alamat1);
					$("#f_alamat2_fb").val(obj.alamat2);
					$("#f_unit_fb").val(obj.unitkerja);
					$("#f_nohp_fb").val(obj.nomorhp);
					$("#f_email_fb").val(obj.email);
					
				}
				state_process('after_send')					
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		})		
	}
</script>
