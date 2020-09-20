<?=$this->load->view('templates/component');?>
<input type="hidden" id="crud">
<input type="hidden" id="oid">
<div id="view_data" class="card card card-default scrollspy">
	<div class="card-content">
		<a class="btn-floating waves-effect waves-effect waves-effect waves-light cyan right" id="btn_add" onclick="openForm('add',0,0)">
			<i class="material-icons">add</i>
		</a>			
		<h4 class="card-title"><?=$title;?></h4>
	</div>

	<div id="div_image_card"></div>	
</div>
<div id="form_data" class="card card card-default scrollspy">
	<div class="card-panel">
		<a class="btn-floating waves-effect waves-light red right-align right" onclick="openForm('close',0,0)">
			<i class="material-icons">clear</i>
		</a>							
		<h4 class="card-title"><?=$title;?></h4>
		<h4 class="card-title" id="lbl_head_form"></h4>		
		<div class="row">
			<div class="file-field input-field">
				<div class="btn">
					<span>File</span>
					<input type="file" id="data_file"> 
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text" id="f_photo">
				</div>
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
	<div id="div_image_card_form"></div>		
</div>

<script>
	var res_json = [];
	var data_rules = rules_module;
	(data_rules.create == 1) ? $("#btn_add").show() : $("#btn_add").hide() ;	
	$(document).ready(function(){
		$("#form_data").hide();

		$("#btn-trigger-controll").click(function() {
			send_file($('#crud').val(), $('#oid').val() )
		})
	});	

	loadData('card',0);

	function loadData(arg,id) 
	{
		axios.post('<?=base_url();?>'+'config/slider/data/'+arg+"/"+id)
		.then(function (response)
		{
			if (response.status == 200) 
			{
				if (arg == 'card') {
					var html_card = "";
					$("#div_image_card").html('')					
					_.forEach(response.data.list, function(res,index) 
					{
						html_card += '<div class="col s12 m6 l4 card-width">'+
										'<div class="card-panel border-radius-6 mt-10 card-animation-1">'+
											'<img class="responsive-img border-radius-8 z-depth-4 image-n-margin" src="<?=base_url().$path;?>'+res.photo+'" alt="images">'+
											'<h6><a href="#" class="mt-5">'+res.photo+'</a></h6>'+
												// '<p>'+res.photo+'</p>'+
											'<div class="row mt-4">'+
												'<div class="col s6">'+
													((data_rules.update == 1) ? loadButton('btn','edit','edit',res.id,res.photo,'','default_class') : '') +
												'</div>'+
												'<div class="col s6 mt-1 right-align">'+
													((data_rules.delete == 1) ? loadButton('btn','delete','delete',res.id,res.photo,'','default_class') : '') +
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>';
					});
					$("#div_image_card").html(html_card)					
				}
				else if(arg == 'single')
				{
					var obj = response.data.list[0];
					$("#oid").val(obj.id);
					$("#f_photo").val(obj.file_foto).change();	
					$("#f_photo").val(obj.photo).change();	
					var html_card = '<div class="col s12 m6 l4 card-width">'+
										'<div class="card-panel border-radius-6 mt-10 card-animation-1">'+
											'<img class="responsive-img border-radius-8 z-depth-4 image-n-margin" src="<?=base_url().$path;?>'+obj.photo+'" alt="images">'+
										'</div>'+
									'</div>';
					$("#div_image_card_form").html(html_card)											
				}
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		})		
	}
	
	function send_file(param,id){
		file_foto = $('#data_file').prop('files')[0];
		var data  = new FormData();
		data.append('file', file_foto);
		axios.post('<?=base_url();?>'+'config/slider/upload_file/'+param+'/'+id, data)			
		.then(function (response) {
			if (response.status == 200) 
			{
				send_response(response,'report');
				if (response.data.status == true) {					
					openForm('close',0,0)
					loadData('card',0);
				}
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		});
	}

	function sendData(data_sender) {		
		state_process('before_send')		
		axios.post('<?=base_url();?>'+'config/slider/store', data_sender)
		.then(function (response) {
			if (response.status == 200) {
				send_response(response,'report');
				if (response.data.status == true) {					
					openForm('close',0,0)
					loadData('card',0);
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
			$('#oid').val(0);
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
					var data_sender = {
						'f_photo' : '',
						'crud' : 'delete',
						'oid' : id
					}
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
