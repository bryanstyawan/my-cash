<?=$this->load->view('templates/component');?>
<input type="hidden" id="crud">
<input type="hidden" id="oid">
<div id="view_data" class="card card card-default scrollspy">
	<div class="card-content">
		<h4 class="card-title"><?=$title;?></h4>
		<div class="row">
			<div class="collapsible_data" id="collapsible_data">
			</div>
		</div>
	</div>
</div>

<script>
	loadData('collapsible',0);

	function loadData(arg,id) 
	{
		state_process('before_send')
		axios.post('<?=base_url();?>'+'core/faq/data/'+arg+"/"+id)
		.then(function (response)
		{
			if (response.status == 200) 
			{
				if (arg == 'collapsible')
				{
					collapsible_insert = "";					
					_.forEach(response.data.list, function(res,index) 
					{
						collapsible_insert += '<ul class="collapsible popout">'+
													'<li>'+
														'<div class="collapsible-header popout">'+
															'<i class="material-icons">chat</i>'+res.pertanyaan+
														'</div>'+
														'<div class="collapsible-body">'+
															'<span>'+res.jawaban+'</span>'+
														'</div>'+
													'</li>'+
											  '</ul>';
						
					});
					$("#collapsible_data").html(collapsible_insert);	
   					$('.collapsible').collapsible({accordion:true});					
				}				
			}
		})
		.catch(function (error) {
			send_response(error.response,'report');
		})		
	}
</script>
