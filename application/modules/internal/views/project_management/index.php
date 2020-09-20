<?=$this->load->view('templates/component');?>
<input type="hidden" id="crud">
<input type="hidden" id="oid">
<input type="hidden" id="oid_task">
<div id="view_data" class="card card card-default scrollspy">
	<div class="card-content">
		<h4 class="card-title"><?=$title;?></h4>
		<div class="row">
			<section id="kanban-wrapper" class="section">
				<div class="kanban-overlay"></div>
				<div class="row">
					<div class="col s12">
					<!-- kanban container -->
						<div id="groups-task-undone"></div>
						<div id="kanban-app" style="overflow-x: scroll;"></div>
					</div>

					<!-- Kanban detail is here -->
					<div id="kanban_modal" class="modal" style="overflow-y: scroll!important;overflow-x: hidden!important;">
						<div class="modal-content">
							<div class="input-field">
								<input type="text" class="edit-kanban-item-title validate" id="edit-item-title" placeholder="kanban Title">
								<label for="edit-item-title" class="active">Card Title</label>
							</div>
							<label>Task</label>											
							<a id="add-task" class="btn-floating btn-small pulse ml-10 right pink accent-3">
								<i class="material-icons">add_alert</i>
							</a>							
							<div class="col s12">									
								<ul class="collapsible popout" id="table-task">
								</ul>
							</div>
							<a id="add-member" class="btn-floating btn-small pulse ml-10 right">
								<i class="material-icons">face</i>
							</a>							
							<div class="col s12">
								<div id="table-member"></div>									
							</div>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn-small waves-effect waves-light left mr-1 delete-kanban-item">
								<span>Delete</span>
							</button>
							<button class="btn-small blue waves-effect waves-light pulse right update-kanban-item">
								<span>Save</span>
							</button>							
						</div>
					</div>

					<!-- Modal member is here -->
					<div id="modal_member" class="modal modal-fixed-footer">
						<div class="modal-content">
							<h4>Member</h4>
							<table id="table-member-list" class="display table-view dataTable dtr-inline">
								<thead>
									<tr>
										<th>No</th>
										<th>Member</th>
										<th>															 
										</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>											
						</div>
					</div>					
					
					<!-- Modal task is here -->					
					<div id="modal_task" class="modal">
						<div class="modal-content">
							<div class="row">
								<div class="col s12">			
									<h4 class="card-title">Task</h4>
									<div class="row">
										<div class="input-field col s12">
											<input placeholder="" class="clean-form" id="f_title" type="text">
											<label for="f_title" class="active">Title</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12">
											<input placeholder="" class="clean-form" id="f_desc" type="text">
											<label for="f_desc" class="active">Desc</label>
										</div>
									</div>

									<div class="row">
										<div class="input-field col s10">
											<input type="hidden" id="f_nip_task">
											<input placeholder="" class="clean-form" id="f_name_task" type="text" disabled="disabled">
											<label for="f_name_pegawai" class="active">PIC</label>
										</div>
										<a id="add-member-pic" class="btn-floating btn-small pulse ml-1 right">
											<i class="material-icons">search</i>
										</a>													
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
				</div>
			</section>		

		</div>
	</div>
</div>
<script>
	var res_json = [];
	var flag_member = '';
	var kanban_curr_el, kanban_curr_item_id, kanban_item_title, kanban_data, kanban_item, kanban_users, kanban_curr_item_date;
	var kanban_board_data = "";	
	var data_initial = {
		'f_title'	 : '',
		'f_desc' 	 : '',		
		'name' 	 	 : '',
		'crud'   	 : '',							
		'oid_parent' : '',
		'oid' 		 : ''
	}		
	var data_sender = [];

	$(".update-kanban-item").on('click', function() 
	{
		data_sender         = data_initial;
		data_sender['name'] = $("#edit-item-title").val();
		data_sender['crud'] = $("#crud").val();
		data_sender['oid']  = $("#oid").val();		
		sendData(data_sender)
	})

	$("#add-member").on('click', function () 
	{
		flag_member = 'member_card';
		$("#modal_member").modal('open');		
	})

	$("#add-member-pic").on('click', function () 
	{
		flag_member = 'pic';		
		$("#modal_member").modal('open');		
	})	


	$("#add-task").on('click', function () 
	{
		$("#crud").val('add_task')		
		$("#modal_task").modal('open');		
	})	

	$(window).on('resize', function () {
		// sidebar display none on screen resize
		$("#kanban_modal").modal('close')		
	});	

	$("#btn-trigger-controll").click(function() {
		var f_title     = $("#f_title").val();
		var f_desc 		= $("#f_desc").val();

		$("#modal_task").modal('close');		
		data_sender = data_initial;
		data_sender['name'] = $("#f_nip_task").val()
		data_sender['f_title']    = f_title,
		data_sender['f_desc']     = f_desc,
		data_sender['crud']       = $("#crud").val(),
		data_sender['oid_parent'] = $("#oid").val(),			
		data_sender['oid']        = $("#oid_task").val()

		if (f_title <= 0) 
		{
			Notiflix.Notify.Failure('Data ini harap diisi')
		}								
		else if(f_desc == 0)
		{
			Notiflix.Notify.Failure('Data ini harap diisi')
		}
		else
		{
			sendData(data_sender)
		}
	})	

	loadData('kanban',0);
	loadData('group_undone_task',0);	
	loadData('table_pegawai',0);	
	function loadData(arg,id) 
	{
		var tr_insert = "";		
		state_process('before_send')		
		axios.post('<?=base_url();?>'+'internal/project_management/data/'+arg+'/'+id)
		.then(function (response) 
		{
			if (response.status == 200) 
			{	
				if (arg == 'kanban') 
				{
					kanban_board_data = response.data.list
					// Kanban Board
					$("#kanban-app").html('')
					var kanbanBoard = new jKanban({
						element: "#kanban-app", // selector of the kanban container
						buttonContent: "+ Add New Item", // text or html content of the board button
						widthBoard: '300px',
						// click on current kanban-item
						click: function (el) {
							// kanban-overlay and sidebar display block on click of kanban-item
							$("#kanban_modal").modal('open')
							// Set el to var kanban_curr_el, use this variable when updating title
							kanban_curr_el = el;

							// Extract  the kan ban item & id and set it to respective vars
							kanban_item_title = $(el).contents()[0].data;
							kanban_curr_item_id = $(el).attr("data-eid");
							// set edit title
							loadData('table_member',kanban_curr_item_id);							
							loadData('table_task',kanban_curr_item_id);
							$("#edit-item-title").val(kanban_item_title);
							$("#oid").val(kanban_curr_item_id)
							$("#crud").val('update_card')							
						},

						dropEl: function(el, target, source, sibling)
						{
							data_sender               = data_initial;
							data_sender['crud']       = 'move_card';							
							data_sender['oid_parent'] = target.parentElement.getAttribute('data-id');
							data_sender['oid']        = $(el).closest(".kanban-item").attr("data-eid");		
							sendData(data_sender)							
						},						
						buttonClick: function (el, boardId) {
							// create a form to add add new element
							var formItem = document.createElement("form");
							formItem.setAttribute("class", "itemform");
							formItem.innerHTML =
								'<div class="input-field">' +
									'<textarea class="materialize-textarea add-new-item" rows="2" autofocus required></textarea>' +
								"</div>" +
								'<div class="input-field display-flex">' +
									'<button type="submit" class="btn-floating btn-small mr-2"><i class="material-icons">add</i></button>' +
									'<button type="button" id="CancelBtn" class="btn-floating btn-small"><i class="material-icons">clear</i></button>' +
								"</div>";

							// add new item on submit click
							kanbanBoard.addForm(boardId, formItem);
							formItem.addEventListener("submit", function (e) {
								e.preventDefault();
								if (boardId == 1) 
								{
									var text                  = e.target[0].value;
									data_sender               = data_initial;
									data_sender['name']       = text;
									data_sender['crud']       = 'insert_card';
									data_sender['oid_parent'] = boardId;									
									sendData(data_sender)
																
									kanbanBoard.addElement(boardId, {
										title: text
									});
									formItem.parentNode.removeChild(formItem);									
								}
								else
								{
									formItem.parentNode.removeChild(formItem);
									toastr.warning('Tidak izinkan')									
								}
							});
							$(document).on("click", "#CancelBtn", function () {
								$(this).closest(formItem).remove();
							})
						},
						addItemButton: true, // add a button to board for easy item creation
						boards: kanban_board_data // data passed from defined variable
					});

					// Add html for Custom Data-attribute to Kanban item
					var board_item_id, board_item_el;
					// Kanban board loop
					for (kanban_data in kanban_board_data) {
						// Kanban board items loop
						for (kanban_item in kanban_board_data[kanban_data].item) {
							var board_item_details = kanban_board_data[kanban_data].item[kanban_item]; // set item details
							board_item_id = $(board_item_details).attr("id"); // set 'id' attribute of kanban-item
							(board_item_el = kanbanBoard.findElement(board_item_id)), // find element of kanban-item by ID
								(board_item_users = board_item_dueDate = board_item_comment = board_item_attachment = board_item_image = board_item_badge =
									" ");

							// check if users are defined or not and loop it for getting value from user's array
							if (typeof $(board_item_el).attr("data-users") !== "undefined") {
								for (kanban_users in kanban_board_data[kanban_data].item[kanban_item].users) 
								{
									image_user_scr = '<?=base_url();?>assets/images/avatar/'+kanban_board_data[kanban_data].item[kanban_item].users[kanban_users];
									if (kanban_board_data[kanban_data].item[kanban_item].users[kanban_users] == null) {
										image_user_scr = '<?=base_url();?>assets/images/avatar/avatar-7.png';										
									}
									board_item_users +=
										'<img class="circle" src="'+image_user_scr+'" alt="Avatar" height="24" width="24">';
								}
							}
							// check if dueDate is defined or not
							if (typeof $(board_item_el).attr("data-dueDate") !== "undefined") {
								if ($(board_item_el).attr("data-dueDate") != '0000-00-00') {
									board_item_dueDate =
										'<div class="kanban-due-date center mb-5 lighten-5 ' + $(board_item_el).attr("data-border") + '"><span class="' + $(board_item_el).attr("data-border") + '-text center"> ' +
										$(board_item_el).attr("data-dueDate") +
										"</span>" +
										"</div>";									
								}
							}
							// check if comment is defined or not
							if (typeof $(board_item_el).attr("data-comment") !== "undefined") {
								board_item_comment =
									'<div class="kanban-comment display-flex">' +
									'<i class="material-icons font-size-small">chat_bubble_outline </i>' +
									'<span class="font-size-small">' +
									$(board_item_el).attr("data-comment") +
									"</span>" +
									"</div>";
							}
							// check if attachment is defined or not
							if (typeof $(board_item_el).attr("data-attachment") !== "undefined") {
								board_item_attachment =
									'<div class="kanban-attachment display-flex">' +
									'<i class="font-size-small material-icons">attach_file</i>' +
									'<span class="font-size-small">' +
									$(board_item_el).attr("data-attachment") +
									"</span>" +
									"</div>";
							}
							// check if Image is defined or not
							if (typeof $(board_item_el).attr("data-image") !== "undefined") {
								image_issue = '<?=base_url();?>assets'+kanban_board_data[kanban_data].item[kanban_item].image;
								board_item_image =
									'<div class="kanban-image mb-1">' +
									'<img class="responsive-img border-radius-4" src=" ' +image_issue+'" alt="kanban-image">';
								("</div>");
							}
							// check if Badge is defined or not
							if (typeof $(board_item_el).attr("data-badgeContent") !== "undefined") {
								board_item_badge =
									'<div class="kanban-badge circle lighten-4 ' +
									kanban_board_data[kanban_data].item[kanban_item].badgeColor +
									'">' +
									'<span class="' + kanban_board_data[kanban_data].item[kanban_item].badgeColor + '-text">' +
									kanban_board_data[kanban_data].item[kanban_item].badgeContent +
									"</span>";
								("</div>");
							}
							
							task_progress = '<div class="kanban-due-date center mb-5 lighten-5 red"><span class="green-text center">Progress '+kanban_board_data[kanban_data].item[kanban_item].task_progress+'</span></div>';
							task_done = '<div class="kanban-due-date center mb-5 lighten-5 green"><span class="green-text center">Done '+kanban_board_data[kanban_data].item[kanban_item].task_done+'</span></div>';													
							
							// add custom 'kanban-footer'
							if (
								typeof (
									$(board_item_el).attr("data-dueDate") ||
									$(board_item_el).attr("data-comment") ||
									$(board_item_el).attr("data-users") ||
									$(board_item_el).attr("data-attachment")
								) !== "undefined"
								) 
							{
								$(board_item_el).append(
									'<div class="kanban-footer mt-3">' +
										board_item_dueDate +			
										task_progress+										
										task_done+																									
										'<div class="kanban-footer-left left display-flex pt-1">' +
											board_item_comment +
											board_item_attachment +
										"</div>" +
										'<div class="kanban-footer-right right">' +
											'<div class="kanban-users">' +									
											board_item_badge +
											board_item_users +
											"</div>" +
										"</div>" +
									"</div>"
								);
							}
							// add Image prepend to 'kanban-Item'
							if (typeof $(board_item_el).attr("data-image") !== "undefined") {
								$(board_item_el).prepend(board_item_image);
							}
						}
					}
					kanban_board_data.map(function (obj) {
						$(".kanban-board[data-id='" + obj.id + "']").find(".kanban-board-header").addClass(obj.headerBg)
					})

					// Kanban-overlay and sidebar hide
					// --------------------------------------------
					$(".kanban-sidebar .delete-kanban-item, .kanban-sidebar .close-icon, .kanban-sidebar .update-kanban-item, .kanban-overlay").on("click", function () {
						$("#kanban_modal").modal('close')
					});

					// Perfect Scrollbar - card-content on kanban-sidebar
					if ($(".kanban-sidebar").length > 0) {
						var ps_sidebar = new PerfectScrollbar(".kanban-sidebar", {
							theme: "dark",
							wheelPropagation: false
						});
					}
					// set unique id on all dropdown trigger
					for (var i = 1; i <= $(".kanban-board").length; i++) {
						$(".kanban-board[data-id='" + i + "']").find(".kanban-board-header .dropdown-trigger").attr("data-target", i);
						$(".kanban-board[data-id='" + i + "']").find("ul").attr("id", i);
					}
					// materialise dropdown initialize
					$('.dropdown-trigger').dropdown({
						constrainWidth: false
					});

					// Making Title of Board editable
					// ------------------------------
					$(document).on("mouseenter", ".kanban-title-board", function () {
						$(this).attr("contenteditable", "true");
						$(this).addClass("line-ellipsis");
					});	

					$(document).on("blur", ".kanban-title-board", function () {
						var $id = $(this)
									.closest(".kanban-board")
									.attr("data-id");
						var $name = $(this)
									.closest(".kanban-title-board").html()

						data_sender         = data_initial;
						data_sender['name'] = $name;
						data_sender['crud'] = 'update_board';
						data_sender['oid']  = $id;
						sendData(data_sender)
					});											

					// Delete Kanban Item
					// -------------------
					$(document).on("click", ".delete-kanban-item", function () {
						$delete_item = kanban_curr_item_id;
						Notiflix.Confirm.Show(
							'Anda yakin ingin hapus data ini ?',
							'',
							'Ya',
							'Tidak',
							function(){ 
								data_sender         = data_initial;
								data_sender['crud'] = 'delete_card';								
								data_sender['oid']  = $delete_item;
								sendData(data_sender)

								addEventListener("click", function () {
									kanbanBoard.removeElement($delete_item);
								});
							},
							function(){}
						);														
					});										
				}
				else if(arg == 'table_member')
				{
					var index1 = 0;		
					$('#table-member').html('')				
					_.forEach(response.data.list, function(res,index) 
					{
						var image_user_scr = '<?=base_url();?>assets/images/avatar/'+res.photo;
						tr_insert += '<div class="chip">'+
										'<img src="'+image_user_scr+'" alt="Contact Person">'+
										res.nama+
										loadButton('icon','delete','delete_chips',res.nip,res.nama,'','default_class')+
									'</div>';									
						index1++;						
					})					
					$('#table-member').html(tr_insert);
				}
				else if(arg == 'table_task')
				{
					var index1 = 0;						
					$('#table-task').html('');
					_.forEach(response.data.list, function(res,index) 
					{
						var _btn_delete = (res.created_by_nip == '<?=$this->session->userdata('sesNip');?>') ? loadButton('btn','delete','delete_task',res.id,res.title,'Delete','orange darken-4 right') : '' ;
						var _btn_well_done = (res.created_by_nip == '<?=$this->session->userdata('sesNip');?>') ? loadButton('btn','on','welldone_task',res.id,res.title,'Well Done','green darken-1 right') : '' ;						

						_btn = (res.is_done == 1) ? loadButton('btn','off','off_task',res.id,res.title,'Review','default_class'): loadButton('btn','on','on_task',res.id,res.title,'Done','green darken-1 right')+loadButton('btn','edit','edit_task',res.id,res.title,'Edit','lime accent-3 right')+_btn_delete ;						
						_btn = (res.status != 2) ? _btn+((res.is_done == 1) ? _btn_well_done : '' ) : ''  ;

						_class = (res.is_done == 1) ? 'orange darken-1 white-text' : '' ;
						_class = (res.status == 2) ? 'purple lighten-2 white-text' : _class ;						
						image_user_scr = '<?=base_url();?>assets/images/avatar/'+res.pegawai_image;
						tr_insert += '<li>'+
										'<div class="collapsible-header '+_class+'">'+
											'<div class="chip">'+
												'<img src="'+image_user_scr+'" alt="Contact Person">'+
												res.pegawai_name+
											'</div>'+						
											'<p class="right">'+res.title+'</p>'+
										'</div>'+
										'<div class="collapsible-body">'+
											'<span class="title">Description</span>'+										
											'<p>'+res.desc+'</p>'+										
											_btn+
										'</div>'+						
									'</li>';
						index1++;						
					})					
					$('#table-task').html(tr_insert);
					$('.collapsible').collapsible({accordion:true});					
				}				
				else if(arg == 'table_pegawai')
				{
					var index1 = 0;						
					destroyTable('table-member-list');					
					_.forEach(response.data.list, function(res,index) 
					{
						tr_insert += '<tr>'+
											'<td>'+(index+1)+'</td>'+
											'<td>'+res.nama+'</td>'+
											'<td>'+
												loadButton('btn','on','on',res.nip,res.nama,'Choose','default_class')+
											'</td>'+											
									'</tr>';
						index1++;						
					})					
					$('#table-member-list tbody').html(tr_insert);
					$('#table-member-list').dataTable();					
				}
				else if(arg == 'single_task')
				{
					var obj = response.data.list[0];
					$("#f_nip_task").val(obj.nip)
					$("#f_name_task").val(obj.pegawai_name)					
					$("#f_title").val(obj.title);
					$("#f_desc").val(obj.desc);
					$("#oid").val(obj.id_pm_card),			
					$("#oid_task").val(obj.id)															
				}
				else if(arg == 'group_undone_task')
				{
					var html_chips = '';
					$('#groups-task-undone').html('');					
					_.forEach(response.data.list, function(res,index) 
					{
						var photo_user = (res.photo != null) ? res.photo : 'avatar-7.png' ;
						var image_user_scr = '<?=base_url();?>assets/images/avatar/'+photo_user;						
						console.log(image_user_scr)
						html_chips += '<div class="chip">'+
												'<img src="'+image_user_scr+'" alt="Contact Person">'+
												'<span class="new badge red" data-badge-caption="">'+res.counter+'</span>'+
												res.name+
											'</div>';
						// console.log(res.name)
					});
					$('#groups-task-undone').html(html_chips);					
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
		axios.post('<?=base_url();?>'+'internal/project_management/store', data_sender)
		.then(function (response) {
			if (response.status == 200)
			{
				send_response(response.data,'none');
				loadData('group_undone_task',0);								
				if (response.data.reload == 1) {					
					loadData('kanban',0);					
				}

				if(data_sender['crud'] == 'update_card' || data_sender['crud'] == 'delete_card')
				{
					$("#kanban_modal").modal('close');							
					loadData('kanban',0);					
				}
				else if (data_sender['crud'] == 'add_member') {					
					loadData('table_member',data_sender['oid_parent']);
					loadData('kanban',0);					
					$("#modal_member").modal('close');					
				} 
				else if(data_sender['crud'] == 'delete_member' 
						|| data_sender['crud'] == 'delete_task'
						|| data_sender['crud'] == 'add_task'
						|| data_sender['crud'] == 'edit_task'												 
						|| data_sender['crud'] == 'task_done' 
						|| data_sender['crud'] == 'task_undone'
						|| data_sender['crud'] == 'welldone_task'
				)
				{
					loadData('table_member',data_sender['oid_parent']);
					loadData('table_task',data_sender['oid_parent']);										
					loadData('kanban',0);					
					$("#modal_member").modal('close');					
				}
			}
		})
		.catch(function (error) 
		{
			send_response(error.response,'report');
		})		
	}

	function openForm(arg,id,name) {
		if (arg == 'on') 
		{
			if (flag_member == 'member_card') {
				Notiflix.Confirm.Show(
					'Pilih pegawai ini ?',					
					name,
					'Ya',
					'Tidak',
					function(){ 
						var data_sender     = data_initial;					
						data_sender['crud'] = 'add_member';
						data_sender['oid_parent'] = $("#oid").val(),						
						data_sender['oid']  = id;
						sendData(data_sender)
					},
					function(){}
				);							
			}
			else
			{
				$("#f_nip_task").val(id)
				$("#f_name_task").val(name)				
				$("#modal_member").modal('close');
			}
		}
		else if(arg == 'delete_chips') 
		{
			Notiflix.Confirm.Show(
				'Hapus pegawai ini ?',
				name,
				'Ya',
				'Tidak',
				function(){ 
					var data_sender     = data_initial;					
					data_sender['crud'] = 'delete_member';
					data_sender['oid_parent'] = $("#oid").val() 
					data_sender['oid']  = id;
					sendData(data_sender)
				},
				function(){
					$("#kanban_modal").modal('close');					
				}
			);	
		}
		else if(arg == 'delete_task')	
		{
			Notiflix.Confirm.Show(
				'Hapus task ini ?',
				name,
				'Ya',
				'Tidak',
				function(){ 
					var data_sender     = data_initial;					
					data_sender['crud'] = 'delete_task';
					data_sender['oid']  = id;
					sendData(data_sender)
				},
				function(){}
			);						
		}
		else if(arg == 'on_task') 
		{
			Notiflix.Confirm.Show(
				'Ubah status',
				'Pekerjaan ini selesai ?',
				'Ya',
				'Tidak',
				function(){ 
					var data_sender     = data_initial;					
					data_sender['crud'] = 'task_done';
					data_sender['oid']  = id;
					data_sender['oid_parent'] = $("#oid").val();					
					sendData(data_sender)
				},
				function(){}
			);			
		}
		else if(arg == 'off_task') 
		{
			Notiflix.Confirm.Show(
				'Ubah Data',
				'Review lagi ?',
				'Ya',
				'Tidak',
				function(){ 
					var data_sender     = data_initial;					
					data_sender['crud'] = 'task_undone';
					data_sender['oid']  = id;
					data_sender['oid_parent'] = $("#oid").val();					
					sendData(data_sender)
				},
				function(){}
			);			
		}		
		else if(arg == 'welldone_task') 
		{
			Notiflix.Confirm.Show(
				'Ubah Data',
				'Pekerjaan ini selesai ?',
				'Ya',
				'Tidak',
				function(){ 
					var data_sender     = data_initial;					
					data_sender['crud'] = 'welldone_task';
					data_sender['oid']  = id;
					data_sender['oid_parent'] = $("#oid").val();					
					sendData(data_sender)
				},
				function(){}
			);			
		}
		else if(arg == 'edit_task')
		{
			loadData('single_task',id)			
			$("#crud").val('edit_task')		
			$("#modal_task").modal('open');			
		}
	}	
</script>
