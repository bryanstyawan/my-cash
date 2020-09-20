<?=$this->load->view('templates/component');?>
<input type="hidden" id="crud">
<input type="hidden" id="oid">
<div id="view_data" class="card card card-default scrollspy">
	<div class="card-content">
		<a class="btn-floating waves-effect waves-effect waves-effect waves-light cyan right" onclick="openForm('add',0,0)">
			<i class="material-icons">add</i>
		</a>			
		<h4 class="card-title"><?=$title;?></h4>
		<div class="row">
			<div class="col s12 dataTables_scrollBody">
				<table id="table-store" class="table-view display dataTable dtr-inline">
					<thead>
						<tr>
							<th>No</th>
							<th>Pertanyaan</th>
                            <th>Jawaban</th>
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
						<input placeholder="Pertanyaan" class="clean-form" id="f_pertanyaan" type="text">
						<label for="f_pertanyaan" class="active">Pertanyaan</label>
					</div>
				</div>
                <div class="row">
					<div class="input-field col s12">
						<input placeholder="Jawaban" class="clean-form" id="f_jawaban" type="text">
						<label for="f_jawaban" class="active">Jawaban</label>
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
        'f_pertanyaan' : '',
        'f_jawaban'    : '',
		'crud' 	 	   : '',
		'oid' 	 	   : ''  
	}	
	$(document).ready(function(){
		$("#form_data").hide();

		$("#btn-trigger-controll").click(function() {
			var f_name       = $("#f_pertanyaan").val();
            var f_jawaban    = $("#f_jawaban").val();
            
			var data_sender = {
                'f_pertanyaan' : f_name,
                'f_jawaban'    : f_jawaban,
				'crud' 	       : $("#crud").val(),
				'oid' 	       : $("#oid").val()  
			}
			if (f_name <= 0) 
			{
				Notiflix.Notify.Failure('Pertanyaan harap diisi')
			}								
			else if(f_jawaban == 0)
			{
				Notiflix.Notify.Failure('Jawaban harap diisi')
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
		axios.post('<?=base_url();?>'+'config/faq/data/'+arg+"/"+id)
		.then(function (response)
		{
			if (response.status == 200) 
			{
				if (arg == 'table')
				{
					tr_insert = "";
					destroyTable('table-store');					
					_.forEach(response.data.list, function(res,index) 
					{
						tr_insert += '<tr>'+
											'<td>'+(index+1)+'</td>'+
                                            '<td>'+res.pertanyaan+'</td>'+
                                            '<td>'+res.jawaban+'</td>'+
											'<td>'+
												loadButton('btn','edit','edit',res.id,res.nama,'','default_class')+
												loadButton('btn','delete','delete',res.id,res.nama,'','default_class')+
											'</td>'+																				
									'</tr>';
					});
					$("#table-store tbody").html(tr_insert);
					$("#table-store").dataTable();							
				}
				else if(arg == 'single')
				{
					obj = response.data.list[0];
					$("#oid").val(obj.id);
                    $("#f_pertanyaan").val(obj.pertanyaan);
                    $("#f_jawaban").val(obj.jawaban);					
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
		axios.post('<?=base_url();?>'+'config/faq/store', data_sender)
		.then(function (response) {
			if (response.status == 200) {
				send_response(response,'report');
				if (response.data.status == true) {					
					$(".clean-form").val("");					
					openForm('close',0,0)
					loadData('table',0);
				}
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		});			
	}

	function openForm(arg,id,name) {
		$(".clean-form").val("");
		if (arg == 'add') 
		{
			$("#view_data").hide();
			$("#lbl_head_form").html("Tambah data");
			$("#crud").val('insert');
			$("#form_data").show();			
		}
		else if (arg == 'edit') 
		{
			loadData('single',id);
			$("#view_data").hide();
			$("#lbl_head_form").html("Ubah data");
			$("#crud").val('update');			
			$("#form_data").show();			
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
			$("#view_data").show();
			$("#form_data").hide();			
		}
	}
</script>
