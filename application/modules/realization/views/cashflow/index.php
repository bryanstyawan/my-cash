<?=$this->load->view('templates/component');?>
<div id="home_data" class="card card card-default scrollspy">
	<div id="cards-extended">
		<div class="card">
			<div class="card-content">
				<div id="btn_add"></div>
				<h4 class="card-title"><?=$title;?></h4>
				<div class="row">
					<a href="#" onclick="openForm('addIncome',0,0)" class="col s12 m6">
						<div class="card gradient-shadow gradient-45deg-light-blue-cyan border-radius-3">
							<div class="card-content center">
								<h5 class="white-text lighten-4">Income</h5>
							</div>
						</div>
					</a>
					<a href="#" onclick="openForm('addExpenses',0,0)" class="col s12 m6">
						<div class="card gradient-shadow gradient-45deg-red-pink border-radius-3">
							<div class="card-content center">
								<h5 class="white-text lighten-4">Expenses</h5>
							</div>
						</div>
					</a>
				</div>
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

					<div class="input-field col s12" id="div_expenses">
						<select id="f_oid_expenses" class="browser-default custom-select"></select>						
						<label for="f_oid_expenses" class="active">Expenses</label>
					</div>
					
					<div class="input-field col s6" id="div_income">
						<select id="f_oid_income" class="browser-default custom-select"></select>						
						<label for="f_oid_income" class="active">Income</label>
					</div>					

					<div class="input-field col s6" id="div_salary_sources">
						<select id="f_oid_salary_sources" class="browser-default custom-select"></select>						
						<label for="f_oid_salary_sources" class="active">Salary Sources</label>
					</div>										

					<div class="input-field col s6">
						<input placeholder="Nama" class="clean-form" id="f_name" type="text">
						<label for="f_name" class="active">Name</label>
					</div>

					<div class="input-field col s6">
						<input placeholder="Nama" class="clean-form" id="f_value" type="text">
						<label for="f_value" class="active">Value</label>
					</div>					

					<div class="input-field col s12">
						<input placeholder="Date" class="clean-form datepicker" id="f_date" type="text">
						<label for="f_date" class="active">Date</label>
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

<div id="view_data">
	<div class="row">
		<div class="col s12 m6 l4 card-width">
			<div class="card border-radius-6">
			<div class="card-content center-align">
				<i class="material-icons amber-text small-ico-bg mb-5">check</i>
				<h4 class="m-0"><b id="div_saldo">21.5k</b></h4>
				<p>Saldo</p>
			</div>
			</div>
		</div>
		<div class="col s12 m6 l4 card-width">
			<div class="card border-radius-6">
			<div class="card-content center-align">
				<i class="material-icons amber-text small-ico-bg mb-5">sentiment_satisfied</i>
				<h4 class="m-0"><b id="div_total_income">890</b></h4>
				<p>Income</p>
				<p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>
				<label id="div_last_income"></label></p>					
			</div>
			</div>
		</div>		
		<div class="col s12 m6 l4 card-width">
			<div class="card border-radius-6">
			<div class="card-content center-align">
				<i class="material-icons amber-text small-ico-bg mb-5">sentiment_dissatisfied</i>
				<h4 class="m-0"><b id="div_total_expenses">1.6k</b></h4>
				<p>Expenses</p>
				<p class="red-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_down</i>
				<label id="div_last_expenses"></label></p>
			</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col s12 m6 xl6">
			<ul id="task-card" class="collection with-header">
				<li class="collection-header cyan">
					<h5 class="task-card-title mb-3">Income</h5>
					<p class="task-card-date">Sept 16, 2019</p>
				</li>
				<div id="li_income"></div>
			</ul>
		</div>
		<div class="col s12 m6 xl6">
			<ul id="task-card" class="collection with-header">
				<li class="collection-header cyan">
					<h5 class="task-card-title mb-3">Expenses</h5>
					<p class="task-card-date">Sept 16, 2019</p>
				</li>
				<div id="li_expenses"></div>
			</ul>
		</div>		
   </div>	
</div>

<script>
	var state = {
		'res_json' : [],
		'data_rules' : rules_module,
		'data' : {
			'f_oid_expenses' : '',			
			'f_oid_income' : '',
			'f_oid_salary_sources' : '',			
			'f_name' : '',
			'f_value' : '',
			'f_date' : '',
			'crud' 	 : '',
			'oid' 	 : '',
			'type'	 : '',			
		},
		'dom' : {
			'insert' : ''
		}
	};

	loadData('list',0);
	loadData('select',0);
	$(document).ready(function(){
		$('#form_data').hide();

		$('#btn-trigger-controll').click(function() {
			state.data.f_name               = $('#f_name').val()
			state.data.f_value              = $('#f_value').val()
			state.data.f_date               = $('#f_date').val()
			state.data.f_oid_expenses       = $('#f_oid_expenses').val()
			state.data.f_oid_income         = $('#f_oid_income').val()
			state.data.f_oid_salary_sources = $('#f_oid_salary_sources').val()															
			if (state.data.f_name.length <= 0) 
			{
				Notiflix.Notify.Failure('Failure to process')
			}								
			else
			{
				sendData(state.data)
			}
		})
	});	

	function loadCard(dataSources,dom) {
		state.dom.insert = '';
		_.forEach(dataSources, function(res,index) 
		{
			state.dom.insert += '<li class="collection-item dismissable">'+
									'<label for="task1">'+
										'<span class="width-100" style="text-decoration: none;">'+res.name+'</span>'+
										'<a href="#" class="secondary-content"><span class="ultra-small">'+res.date+'</span></a>'+
										'<span class="task-cat cyan">'+numberWithCommas('Rp. '+res.value)+'</span>'+
									'</label>'+
								'</li>';
		})		
		$("#"+dom).html(state.dom.insert)
	}

	function loadData(arg,id) 
	{
		state_process('before_send')
		axios.post('<?=base_url();?>'+'realization/cashflow/data/'+arg+'/'+id)
		.then(function (response) 
		{
			if (response.status == 200) 
			{
				if (arg == 'list') 
				{
					var incomeDatasources = _.pickBy(response.data.list, function(value, key){return (value.type == 'income')});
					var expensesDatasources = _.pickBy(response.data.list, function(value, key){return (value.type == 'expenses')});
					var totalIncome = _.sum(_.map(incomeDatasources,item => {return parseInt(item.value)}));
					var totalExpenses = _.sum(_.map(expensesDatasources,item => {return parseInt(item.value)}));
					var totalSaldo = totalIncome - totalExpenses;
					$("#div_saldo").html(numberWithCommas('Rp. '+totalSaldo))
					$("#div_total_expenses").html(numberWithCommas('Rp. '+totalExpenses))
					$("#div_total_income").html(numberWithCommas('Rp. '+totalIncome))
					$("#div_last_income").html(numberWithCommas('Rp. '+_.last(_.map(incomeDatasources,item => {return parseInt(item.value)}))))
					$("#div_last_expenses").html(numberWithCommas('Rp. '+_.last(_.map(expensesDatasources,item => {return parseInt(item.value)}))))
					loadCard(incomeDatasources,'li_income');
					loadCard(expensesDatasources,'li_expenses');				
				}
				else if(arg == 'select')
				{
					_.forEach(response.data, function(res,index) 
					{
						var _name     = res.name;
						$('#'+_name).html('')
						$('#'+_name).append($('<option>', { 
							value: 0,
							text : ' - - - - '
						}));						
						_.forEach(res.detail, function(res1,index)
						{
							$('#'+_name).append($('<option>', { 
								value: res1.id,
								text : res1.name
							}));
						})											
					})
				}
				else if(arg == 'single')
				{
					var obj = response.data.list[0];
					state.data.oid = obj.id;
					state.data.type = obj.type;																
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
		axios.post('<?=base_url();?>'+'realization/cashflow/store', data_sender)
		.then(function (response) {
			send_response(response,'report');
			if (response.data.status == true) {					
				$('.clean-form').val('');
				loadData('list',0);				
				openForm('close',0,0);
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
		if (arg == 'addIncome') {
			state.data.crud = 'insert';
			state.data.type = 'income';						
			$('#home_data').hide();
			$('#lbl_head_form').html(' > Add income');
			$('#form_data').show();
			$('#div_income').show();
			$('#div_salary_sources').show();			
			$('#div_expenses').hide();			
		}
		else if (arg == 'addExpenses') {
			state.data.crud = 'insert';
			state.data.type = 'expenses';						
			$('#home_data').hide();
			$('#lbl_head_form').html(' > Add expenses');
			$('#form_data').show();	
			$('#div_expenses').show();			
			$('#div_income').hide();
			$('#div_salary_sources').hide();					
		}
		else if (arg == 'edit') 
		{
			state.data.crud = 'update';			
			loadData('single',id);						
			$('#home_data').hide();
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
			$('#home_data').show();
			$('#form_data').hide();			
		}
	}
</script>		
