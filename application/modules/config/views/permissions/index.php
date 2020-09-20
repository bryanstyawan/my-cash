<?=$this->load->view('templates/component');?>
<input type="hidden" id="crud">
<input type="hidden" id="oid">
<div class="card card card-default scrollspy">
	<div class="card-content">
		<h4 class="card-title"><?=$title;?></h4>
		<select id="select-trigger" class="browser-default custom-select"></select>
	</div>
</div>

<div id="view_data" class="card card card-default scrollspy">
	<div class="card-content">
		<div class="row">
			<label class="col s12 dataTables_scrollBody">
				<table id="table-store" class="display dataTable dtr-inline">
					<thead></thead>
					<tbody></tbody>
				</table>
			</div>
		</div>		
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#view_data').hide();
		$('#select-trigger').on('change', function() {
			if ($(this).val() != 0) {
				loadData('menus',$(this).val());							
			}
		});		
	});	

	function checkbox_permissions(id_menus,id_groups,arg) 
	{
		var data = 0;
		var crud = '';		
		if (arg == 'read' || arg == 'create' || arg == 'update' || arg == 'delete' || arg == 'verify' || arg == 'notify') 
		{
			crud = 'update';			
			data = ($('#c_'+arg+'_'+id_menus+id_groups).val() == 0) ? 1 : 0 ;
			$('#c_'+arg+'_'+id_menus+id_groups).val(data);			
		}
		else if(arg == 'read_group' || arg == 'create_group' || arg == 'update_group' || arg == 'delete_group' || arg == 'verify_group' || arg == 'notify_group')
		{
			crud = 'update_groups';			
			arg  = arg.replace('_group',''); 
			data = ($('#c_'+arg+'_group').val() == 0) ? 1: 0 ;
			console.log($('#c_'+arg+'_group').val())			
			console.log(data)
			$('#c_'+arg+'_group').val(data);			
		}

		var data_sender = 
		{
			'id_menus' : id_menus,
			'id_groups': id_groups,
			'value'    : data,
			'parameter': arg,
			'crud'     : crud 
		}
		sendData(data_sender)		

	}

	loadData('group',0);

	function template(res,def_class,body)
	{
		_name 			= ((body == 1) ? res.name : 'Menu' );
		_id 			= ((body == 1) ? res.permissions.id_menus+res.permissions.id_groups : "group" );
		_id_menu 		= ((body == 1) ? res.permissions.id_menus : 0 );
		_id_group 		= ((body == 1) ? res.permissions.id_groups : res.id_groups );
		_value_read 	= ((body == 1) ? res.permissions.read : res.read );

		_value_create 	= ((body == 1) ? res.permissions.create : res.create );
		_value_update 	= ((body == 1) ? res.permissions.update : res.update );
		_value_delete 	= ((body == 1) ? res.permissions.delete : res.delete  );
		_value_verify 	= ((body == 1) ? res.permissions.verify : res.verify  );
		_value_notify 	= ((body == 1) ? res.permissions.notify : res.notify  );				


		check_read 		= ((body == 1) ? ((res.permissions.read   == 0) ? '': 'checked')  : ((res.read   == 0) ? '': 'checked'));
		check_create 	= ((body == 1) ? ((res.permissions.create   == 0) ? '': 'checked')  : ((res.create   == 0) ? '': 'checked'));
		check_update 	= ((body == 1) ? ((res.permissions.update   == 0) ? '': 'checked')  : ((res.update   == 0) ? '': 'checked'));
		check_delete 	= ((body == 1) ? ((res.permissions.delete   == 0) ? '': 'checked')  : ((res.delete   == 0) ? '': 'checked'));
		check_verify 	= ((body == 1) ? ((res.permissions.verify   == 0) ? '': 'checked')  : ((res.verify   == 0) ? '': 'checked'));
		check_notify 	= ((body == 1) ? ((res.permissions.notify   == 0) ? '': 'checked')  : ((res.notify   == 0) ? '': 'checked'));				

		_create 		= ((body == 1) ? "'create'" : "'create_group'" );
		_read 			= ((body == 1) ? "'read'" : "'read_group'" );
		_update 		= ((body == 1) ? "'update'" : "'update_group'" );
		_delete 		= ((body == 1) ? "'delete'" : "'delete_group'" );
		_verify 		= ((body == 1) ? "'verify'" : "'verify_group'" );
		_notify 		= ((body == 1) ? "'notify'" : "'notify_group'" );						
		
		_lbl_create 	= ((body == 1) ? '' : "Create" );
		_lbl_read 		= ((body == 1) ? '' : "Read" );
		_lbl_update 	= ((body == 1) ? '' : "Update" );
		_lbl_delete 	= ((body == 1) ? '' : "Delete" );
		_lbl_verify 	= ((body == 1) ? '' : "Verify" );
		_lbl_notify 	= ((body == 1) ? '' : "Notify" );						

		return '<tr class="'+def_class+'">'+
					'<td>'+_name+'</td>'+
					'<td>'+
						'<div class="switch">'+
							_lbl_read+
							'<label>'+
								'<input id="c_read_'+_id+'" value="'+_value_read+'" onclick="checkbox_permissions('+_id_menu+','+_id_group+','+_read+')" type="checkbox" '+check_read+'>'+ 
								'<span class="lever"></span>'+
							'</label>'+
						'</div>'+												
					'</td>'+
					'<td>'+
						'<div class="switch">'+
							_lbl_create+
							'<label>'+
								'<input id="c_create_'+_id+'" value="'+_value_create+'" onclick="checkbox_permissions('+_id_menu+','+_id_group+','+_create+')" type="checkbox" '+check_create+'>'+ 
								'<span class="lever"></span>'+
							'</label>'+
						'</div>'+												
					'</td>'+
					'<td>'+
						'<div class="switch">'+
							_lbl_update+
							'<label>'+
								'<input id="c_update_'+_id+'" value="'+_value_update+'" onclick="checkbox_permissions('+_id_menu+','+_id_group+','+_update+')" type="checkbox" '+check_update+'>'+ 
								'<span class="lever"></span>'+
							'</label>'+
						'</div>'+												
					'</td>'+
					'<td>'+
						'<div class="switch">'+
							_lbl_delete+
							'<label>'+
								'<input id="c_delete_'+_id+'" value="'+_value_delete+'" onclick="checkbox_permissions('+_id_menu+','+_id_group+','+_delete+')" type="checkbox" '+check_delete+'>'+ 
								'<span class="lever"></span>'+
							'</label>'+
						'</div>'+												
					'</td>'+
					'<td>'+
						'<div class="switch">'+
							_lbl_verify+
							'<label>'+
								'<input id="c_verify_'+_id+'" value="'+_value_verify+'" onclick="checkbox_permissions('+_id_menu+','+_id_group+','+_verify+')" type="checkbox" '+check_verify+'>'+ 
								'<span class="lever"></span>'+
							'</label>'+
						'</div>'+												
					'</td>'+
					'<td>'+
						'<div class="switch">'+
							_lbl_notify+
							'<label>'+
								'<input id="c_notify_'+_id+'" value="'+_value_notify+'" onclick="checkbox_permissions('+_id_menu+','+_id_group+','+_notify+')" type="checkbox" '+check_notify+'>'+ 
								'<span class="lever"></span>'+
							'</label>'+
						'</div>'+												
					'</td>'+																																																																																														
				'</tr>';
	}

	function loadData(arg,id) 
	{
		state_process('before_send')
		axios.post('<?=base_url();?>'+'config/permissions/data/'+arg+'/'+id)
		.then(function (response) 
		{
			if (response.status == 200) 
			{
				if (arg == 'group') {
					dom_insert = '';
					dom_insert += '<option value="0">- - - - - - </option>';					
					_.forEach(response.data.list, function(res,index) 
					{
						dom_insert += '<option value="'+res.id+'">'+res.name+'</option>';						
					});
					$('#select-trigger').html(dom_insert);										
				}
				else if(arg == 'menus')
				{			
					$('#view_data').show();
					if (response.data.list.length != 0)
					{				
						dom_insert = '';
						group_id = 0;
						_nactive_read = 0;
						_nactive_create = 0;
						_nactive_update = 0;
						_nactive_delete = 0;
						_nactive_verify = 0;
						_nactive_notify = 0;						
						_.forEach(response.data.list, function(res) 
						{
							group_id = res.permissions.id_groups;
							(res.permissions.read == 0) ? _nactive_read++ : '' ;
							(res.permissions.create == 0) ? _nactive_create++ : '' ;
							(res.permissions.update == 0) ? _nactive_update++ : '' ;
							(res.permissions.delete == 0) ? _nactive_delete++ : '' ;
							(res.permissions.verify == 0) ? _nactive_verify++ : '' ;
							(res.permissions.notify == 0) ? _nactive_notify++ : '' ;							
							dom_insert +=  template(res,'gradient-45deg-purple-deep-orange white-text',1);
							_.forEach(res.child, function(res1) {
								(res1.permissions.read == 0) ? _nactive_read++ : '' ;
								(res1.permissions.create == 0) ? _nactive_create++ : '' ;
								(res1.permissions.update == 0) ? _nactive_update++ : '' ;
								(res1.permissions.delete == 0) ? _nactive_delete++ : '' ;
								(res1.permissions.verify == 0) ? _nactive_verify++ : '' ;
								(res1.permissions.notify == 0) ? _nactive_notify++ : '' ;								
								dom_insert +=  template(res1,'deep-purple darken-2 white-text',1);
								_.forEach(res1.child, function(res2) {	
									(res2.permissions.read == 0) ? _nactive_read++ : '' ;
									(res2.permissions.create == 0) ? _nactive_create++ : '' ;
									(res2.permissions.update == 0) ? _nactive_update++ : '' ;
									(res2.permissions.delete == 0) ? _nactive_delete++ : '' ;
									(res2.permissions.verify == 0) ? _nactive_verify++ : '' ;
									(res2.permissions.notify == 0) ? _nactive_notify++ : '' ;																		
									dom_insert +=  template(res2,'teal darken-4 white-text',1);
									_.forEach(res2.child, function(res3) {
										(res3.permissions.read == 0) ? _nactive_read++ : '' ;
										(res3.permissions.create == 0) ? _nactive_create++ : '' ;
										(res3.permissions.update == 0) ? _nactive_update++ : '' ;
										(res3.permissions.delete == 0) ? _nactive_delete++ : '' ;
										(res3.permissions.verify == 0) ? _nactive_verify++ : '' ;
										(res3.permissions.notify == 0) ? _nactive_notify++ : '' ;										
										dom_insert +=  template(res3,'#ff6f00 amber darken-4 white-text',1);								
									})												
								})											
							})										
						})
						$('#table-store tbody').html(dom_insert);						
						res_head = {
							'id_groups' : group_id,
							'read'		: ((_nactive_read != 0) ? 0 : 1 ),
							'create'	: ((_nactive_create != 0) ? 0 : 1 ),
							'update'	: ((_nactive_update != 0) ? 0 : 1 ),
							'delete'	: ((_nactive_delete != 0) ? 0 : 1 ),
							'verify'	: ((_nactive_verify != 0) ? 0 : 1 ),
							'notify'	: ((_nactive_notify != 0) ? 0 : 1 )														
						}
						dom_insert_head = template(res_head,'',0) 
						$('#table-store thead').html(dom_insert_head);						
					}							
				}
				state_process('after_send')				
			}
		})
		.catch(function (error) 
		{
			send_response(error.response,'report');
		})		
	}

	function sendData(data_sender) {
		state_process('before_send')		
		axios.post('<?=base_url();?>'+'config/permissions/store', data_sender)
		.then(function (response) {
			if (response.status == 200) 
			{
				send_response(response,'on');
				loadData('menus',data_sender['id_groups']);
			}
		})
		.catch(function (error) 
		{
			send_response(error.response,'report');
		});			
	}
</script>
