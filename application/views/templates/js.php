<script>
	// var rules_module = []
	// $(document).bind("contextmenu",function(e) {
	// 	e.preventDefault();
	// });
	// eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}))


	function open_main_route(route,parent) 
	{
		state_process('before_send')		
        if(parent == 'redirect')
        {
            window.location.href = "<?php echo site_url();?>"+route;			
        }
        else if(parent == 'refresh')
        {
            location.reload();            
        }
        else
        {						
			$("#main_content").html('');
			notify()						
			axios.post('<?=base_url();?>core/session_check')
			.then(function (res) {
				if (res.status == 200) 
				{
					if (res.data == 1) 
					{						
						if (parent != 'no-privileged') {
							axios.post('<?=base_url();?>'+'core/privileged', {'route' : route})
							.then(function (response_privileged) {
								if (response_privileged.status == 200) 
								{
									rules_module = response_privileged.data.value;
									if (response_privileged.data.status == true) {
										routes(route);																			
									}
									else
									{
										state_process('after_send')									
									}
								}
							})
							.catch(function (error) 
							{
								send_response(error.response,'report');
							});							
						} else {
							routes(route);							
						}												
					}
					else
					{
						open_main_route('auth','redirect')						
					}
				}
			})				
        }
	}

	function notify() {
		axios.post('<?=base_url();?>'+'core/notify')
		.then(function (response) {
			if (response.status == 200) 
			{
				// console.log(response.data.value)
				if (response.data.value != 0) {
					var html_notify = '';
					var global_counter = _.sumBy(response.data.value, function(o) { return o.component.counter; });
					_.forEach(response.data.value, function(key) 
					{
						var route = "'"+key.component.route+"'"											
						if (key.component.counter != 0) {
							html_notify += '<li tabindex="0">'+
											'<a class="black-text" onclick="open_main_route('+route+','+0+')">'+
												'<span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>'+ 
												key.component.name+' '+key.component.text+
												'<span class="new badge right" data-badge-caption="Data">'+key.component.counter+'</span>'+
												'</a>'+
											'<time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>'+
										'</li>';							
						}										
					})			
					$("#div_notify").html(html_notify)							
					$(".global-count-notify").html(global_counter)					
				}
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		});		
	}

	function routes(arg) {
		axios.post('<?=base_url();?>'+arg)
		.then(function (response) {
			state_process('after_send')				
			if (response.status == 200) 
			{
				$("#main_content").html(response.data);					
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		});		
	}

	function send_response(obj,msg) 
	{		
		if (obj != undefined) {
			setTimeout(function(){state_process('after_send')}, 500);
			if (obj.status == 200) {
				if (obj.data.status == true)
				{
					notify();
					if (msg == 'notify') {
						Notiflix.Notify.Success(obj.data.text);                
					}
					else if(msg == 'report')
					{
						Notiflix.Report.Success(obj.data.text,'','Ok');				
					}
					else if(msg == 'none'){}
				}
				else if(obj.data.status == false)
				{            
					if (msg == 'notify') {Notiflix.Notify.Failure(obj.data.text)}
					else if(msg == 'report') {Notiflix.Report.Failure(obj.data.text,'','ok')}
					else if(msg == 'none') {Notiflix.Notify.Failure(obj.data.text)}

					if(obj.status == 'logoff') {open_main_route('auth','redirect')}
				}						
			}
			else if(obj.status == 500)
			{
				Notiflix.Report.Failure('['+obj.status+'] '+obj.statusText,obj.status,'Ok');			
			}
		}	
	}

	function state_process(arg) {
		if (arg == 'before_send') 
		{			
			Notiflix.Loading.Hourglass('Mohon Tunggu...');			
		}
		else if (arg == 'after_send')
		{
			Notiflix.Loading.Remove(0);						
		}
	}

	function destroyTable(table) 
	{
		$('#'+table+'').dataTable().fnDestroy();
		$('#'+table+' tbody tr').remove();					
	}

	function loadButton(types,state,arg,_key,_name,othername,classes) 
	{
		_name       = "'"+_name+"'";
		_key        = "'"+_key+"'";
		_arg        = "'"+arg+"'";				
		_class      = "";
		_class_icon = "";
		_icon       = "";


		var res = '';
		if (types == 'icon') {
			res = '<i class="close material-icons" onclick = "openForm('+_arg+','+_key+','+_name+')">close</i>';
		}
		else if (types == 'btn')
		{
			if (state == 'add')
			{
				othername = (othername != '') ? othername : 'Tambah' ;
				_class = ((classes == 'default_class') ? "cyan col s12" : classes) ;
				_class_icon = "left";			
				_icon = "add";
			}			
			else if (state == 'edit') 
			{
				othername = (othername != '') ? othername : 'Ubah' ;
				_class = ((classes == 'default_class') ? "lime accent-3 col s12" : classes) ;
				_class_icon = "left";			
				_icon = "edit";		
				_name = 0;			
			}
			else if(state == 'delete')
			{
				othername = (othername != '') ? othername : 'Hapus' ;			
				_class = ((classes == 'default_class') ? "orange darken-4 col s12" : classes) ;				
				_class_icon = "left";			
				_icon = "delete";
			}
			else if (state == 'archive')
			{
				othername = (othername != '') ? othername : 'Arsip' ;
				_class = ((classes == 'default_class') ? "pink darken-1 col s12" : classes) ;				
				_class_icon = "left";			
				_icon = "insert_drive_file";			
			}			
			else if (state == 'verify') 
			{
				othername = (othername != '') ? othername : 'Verifikasi' ;
				_class = ((classes == 'default_class') ? "lime accent-3 col s12" : classes) ;				
				_class_icon = "left";			
				_icon = "verified_user";			
			}			
			else if(state == 'on')
			{
				othername = (othername != '') ? othername : 'Aktif' ;			
				_class = ((classes == 'default_class') ? "green darken-1 col s12" : classes) ;				
				_class_icon = "left";			
				_icon = "power_settings_new";				
			}
			else if (state == 'off')
			{
				othername = (othername != '') ? othername : 'Tidak Aktif' ;			
				_class = ((classes == 'default_class') ? "red darken-1 col s12" : classes) ;
				_class_icon = "left";			
				_icon = "power_settings_new";
			}			
			else if (state == 'view')
			{
				othername = (othername != '') ? othername : 'Lihat' ;
				_class = ((classes == 'default_class') ? "pink darken-1 col s12" : classes) ;				
				_class_icon = "left";			
				_icon = "pageview";		
			}			
			else if (state == 'choose') 
			{
				othername = (othername != '') ? othername : 'Pilih' ;
				_class = ((classes == 'default_class') ? "green darken-1 col s12" : classes) ;
				_class_icon = "left";			
				_icon = "check";
				console.log(_class)
			}
			else if (state == 'upload')
			{
				othername = (othername != '') ? othername : 'Upload' ;
				_class = ((classes == 'default_class') ? "pink darken-1 col s12" : classes) ;				
				_class_icon = "left";
				_icon = "file_upload";
			}						

			res = '<button class="btn btn_margin waves-effect waves-light '+_class+'" type = "submit" onclick = "openForm('+_arg+','+_key+','+_name+')" name="action">'+
						'<i class="material-icons '+_class_icon+'">'+_icon+'</i>'+
						othername+
					'</button>';
		}


		return res;		
	}	
	
	function status_res(res)
	{
		var _status = "";
		switch (res) {
			case '0':
				_status = 'Draf';
				break;
			case '1':
				_status = 'Aktif';
				break;
			case '2':
				_status = 'Tidak Aktif';
				break;
			case '3':
				_status = 'Arsip';
				break;
			case '4':
				_status = 'Hapus';
				break;
			default:
				break;
		}
		return _status;
	}

	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	function logout() {
		Notiflix.Confirm.Show(
			'Logout',
			'Anda yakin ingin logout dari aplikasi ?',
			'Ya, logout',
			'Tidak',
			function(){ 
				open_main_route('auth/signout','redirect')
			},
			function(){}
		);		
	}

	function aside() {
		notify()
		axios.post('<?=base_url();?>'+'core/aside')
		.then(function (response) 
		{
			if (response.status == 200) 
			{
				if (response.data.length != 0)
				{	
					var html_component =  loadAside(response.data,'');
					$("#main_aside_left_menu").html(html_component);	
					$('.collapsible').collapsible();				
				}
			}
		})
		.catch(function (error) {
			console.log(error);
		});		
	}

	function loadAside(data,html_component) {
		_.forEach(data, function(parent) 
		{
			_parent = "";
			_parent_has_child = "";					
			if (parent.child.length == 0) {
				_parent = asideDataLink('no',parent);
			}
			else
			{
				_parent = asideDataLink('yes',parent);
				_child = "";
				if (parent.child.length != 0) {
					_.forEach(parent.child, function(child) {
						if (child.child.length == 0) {
							_child += '<li>'+asideDataLink('no',child)+'</li>';								
						}
						else
						{
							_child_has_child1 = "";
							_child1 = "";

							if (child.child.length != 0) {
								_.forEach(child.child, function(child1) {
									if (child1.child.length == 0) {
										_child1 += '<li class="">'+asideDataLink('no',child1)+'</li>';										
									}
									else
									{
										_child1_has_child2 = asideGetChildren(child1.child);
										_child1 += '<li class="">'+asideDataLink('yes',child1)+_child1_has_child2+'</li>';
									}
								});										
							}

							_child_has_child1 = '<div class="collapsible-body">'+
													'<ul class="collapsible collapsible-sub" data-collapsible="accordion">'+
														_child1+
													'</ul>'+
												'</div>';																																			
							_child += '<li>'+asideDataLink('yes',child)+_child_has_child1+'</li>';																											
						}
					});													
				}

				_parent_has_child = '<div class="collapsible-body">'+
										'<ul class="collapsible collapsible-sub" data-collapsible="accordion">'+
											_child+
										'</ul>'+
									'</div>';						

			}					
			html_component += '<li class="bold">'+
								_parent+
								_parent_has_child+
							'</li>';					
		});								

		return html_component;			
	}

	function asideDataLink(hasChild,data) 
	{
		var html_aside = '';
		if (data.rules.length != 0) {
			if (data.rules[0].read == 1) {
				if (hasChild == 'yes') {
					html_aside = '<a class="collapsible-header waves-effect waves-cyan " href="#" data-i18n="" tabindex="0">'+
								'<i class="material-icons">'+data.icon+'</i>'+
								'<span>'+data.name+'</span>'+
							'</a>';			
				}
				else
				{
					var route = "'"+data.url+"'"					
					html_aside = '<a href="#" onclick="open_main_route('+route+','+0+')" class="waves-effect waves-cyan">'+
												'<i class="material-icons">'+data.icon+'</i>'+
												'<span class="nav-text">'+data.name+'</span>'+
											'</a>';
				}			
			}
		}
				
		return html_aside;
	}

	function asideGetChildren(data) {
		var _hasChild = "";
		var _dataChild = "";
		_.forEach(data, function(key) 
		{
			if (key.child.length == 0) {
				_dataChild += '<li class="">'+asideDataLink('no',key)+'</li>';										
			}
			else
			{
				_dataChild += '<li class="">'+asideDataLink('yes',key)+'</li>';
			}			
		})		

		_hasChild = '<div class="collapsible-body">'+
								'<ul class="collapsible collapsible-sub" data-collapsible="accordion">'+
									_dataChild+
								'</ul>'+
							'</div>';															
		return _hasChild;
	}	
	
    $(document).ready(function()
    {
		$('.tabs').tabs();		
		$('.modal').modal();		
		$('.custom-select').select2();
		$(".datepicker").datepicker(
			{
				// autoClose: !0,
				format: 'yyyy-mm-dd',
				container: "body",
				selectYears: 100,
				selectMonths: true,
				// setDefaultDate:true,
				// max: true,
				onClose: function() {
					$(this).blur();
				},            			
				onDraw: function() {
					$(".datepicker-container").find(".datepicker-select").addClass("browser-default"),
					$(".datepicker-container .select-dropdown.dropdown-trigger").remove()
				}
			}
		).datepicker("setDate", new Date());;		

        $('.datepicker').on('mousedown',function(event){
            event.preventDefault();
		})	

		$(".table-view").dataTable();
	
	});	
	$.fn.disf = function() {
    	$(this).prop('disabled', false);
	}
	$.fn.dist = function() {
		$(this).prop('disabled', true);
	}

</script>
