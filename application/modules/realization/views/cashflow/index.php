<?=$this->load->view('templates/component');?>
<div id="home_data" class="card card card-default scrollspy">
	<div id="cards-extended">
		<div class="card">
			<div class="card-content">
				<div id="btn_add"></div>
				<h4 class="card-title"><?=$title;?></h4>
				<div class="row">
					<div class="input-field col s6">
						<select id="f_months_select" class="browser-default custom-select"></select>						
						<label for="f_months_select" class="active">Months</label>
					</div>
					<div class="input-field col s6">
						<select id="f_years_select" class="browser-default custom-select"></select>						
						<label for="f_years_select" class="active">Years</label>
					</div>															
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
				<p>Cash</p>
			</div>
			</div>
		</div>
		<div class="col s12 m6 l4 card-width">
			<div class="card border-radius-6">
			<div class="card-content center-align">
				<a href="#" onclick="openForm('addIncome',0,0)"><i class="material-icons green-text small-ico-bg mb-5 right">add</i></a>
				<i class="material-icons amber-text small-ico-bg mb-5" >sentiment_satisfied</i>
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
				<a href="#" onclick="openForm('addExpenses',0,0)"><i class="material-icons green-text small-ico-bg mb-5 right">add</i></a>			
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
		<div class="col s12 m6 l6 card-width">
			<div class="card border-radius-6">
			<div class="card-content center-align">
				<h4>Expenses Category</h4>
				<canvas id="expensesCategoryChart" width="400" height="400"></canvas>			
			</div>
			</div>
		</div>	
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

	$(() => {
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

	var loadCard = (dataSources,dom) => {
		state.dom.insert = '';
		_.forEach(dataSources, function(res,index) 
		{
			state.dom.insert += '<li class="collection-item dismissable">'+
									'<label for="task1">'+
										'<span class="width-100" style="text-decoration: none;">'+res.name+'</span>'+
										'<span class="secondary-content"><span class="ultra-small">'+res.date+'</span></span>'+
										'<span class="task-cat cyan">'+((dom == li_income) ? res.name_income : res.name_expenses)+'</span>'+										
										'<span class="task-cat right cyan">'+numberWithCommas('Rp. '+res.value)+'</span>'+										
									'</label>'+
								'</li>';
		})		
		$("#"+dom).html(state.dom.insert)
	}

	var visualisationExpenses = (dataSources) => {
		var model = {name_expenses : null, value:null};
		dataSources1 = _.without(dataSources, model )
		// console.log(dataSources1)
		var result = _(dataSources)
			.groupBy('name_expenses')
			.map(function(items, cat) {
				return {
					category: cat,
					names: _.map(items, 'name'),
					value: _.sum(_.map(items,sources => {return parseInt(sources.value)})),
					color: randomColor(50)
				};
			}).value();

		var data = {
			labels: _.map(result, items => {return items.category}),
			datasets: [{
				label: '# of Votes',
				data: _.map(result, items => {return items.value}),
				backgroundColor: _.map(result, items => {return items.color}),
				borderColor: _.map(result, items => {return items.color}),
				borderWidth: 1
			}]
		};

		var option = {
			tooltips: {
				callbacks: {
					label: function(tooltipItem, data) {
						return `${data.labels[tooltipItem.index]} - ${numeral(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]).format('0,0')}`;
					}
				}
			},
			plugins: {
				datalabels: {
					formatter: function(value, context) {
						return numeral(value).format('0,0');
					}
				}
			}
		};

		new Chart($("#expensesCategoryChart"), {type: 'pie',data: data,options: option});
		// new Chart($("#expensesCategoryChart1"), {type: 'pie',data: data,options: option});				
	}

	var loadData = (arg,id) => 
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
					var lastIncome = _.last(_.map(incomeDatasources,item => {return parseInt(item.value)}));
					var lastExpenses = _.last(_.map(expensesDatasources,item => {return parseInt(item.value)}));
					$("#div_last_income").html(numberWithCommas('Rp. '+(typeof(lastIncome) != 'undefined') ? lastIncome : 0))
					$("#div_last_expenses").html(numberWithCommas('Rp. '+(typeof(lastExpenses) != 'undefined') ? lastExpenses : 0))
					loadCard(incomeDatasources,'li_income');
					loadCard(expensesDatasources,'li_expenses');
					visualisationExpenses(expensesDatasources)
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
							console.log(res1)
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

	var sendData = (data_sender) => {
		state_process('before_send')		
		axios.post('<?=base_url();?>'+'realization/cashflow/store', data_sender)
		.then(function (response) {
			send_response(response,'report');
			if (response.data.status == true) {					
				$('.clean-form').val('');
				loadData('list',0);				
				loadData('select',0);					
				openForm('close',0,0);
				loadData('table',0);
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		});			
	}

	var openForm = (arg,id,name) => 
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

	loadData('list',0);
	loadData('select',0);	
</script>		
