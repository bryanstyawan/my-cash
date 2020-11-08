<html class="loading" lang="en" data-textdirection="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
		<meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
		<meta name="author" content="ThemeSelect">
		<title>Login | My Cash</title>
		<link rel="apple-touch-icon" href="../../../app-assets/images/favicon/apple-touch-icon-152x152.png">
		<link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/favicon/favicon-32x32.png">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="<?=base_url();?>bundle.js"></script>
		<?=$this->load->view('templates/js_library');?>
		<?=$this->load->view('templates/css_library');?>
		<style>
		.login-bg {
			background-image: url("<?=base_url();?>assets/images/gallary/<?=$logo;?>");
		}		
		</style>		
	</head>
  	<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column login-bg blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
		<div class="row">
			<div class="col s12">
				<div class="container"><div id="login-page" class="row">
					<div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
						<div class="login-form">
							<div class="row">
								<div class="input-field col s12">
								<h5 class="ml-4">My Cash</h5>
								</div>
							</div>
							<div class="row margin">
								<div class="input-field col s12">
								<i class="material-icons prefix pt-2">person_outline</i>
								<input id="f_username" type="text">
								<label for="f_username" class="center-align">Username</label>
								</div>
							</div>
							<div class="row margin">
								<div class="input-field col s12">
								<i class="material-icons prefix pt-2">lock_outline</i>
								<input id="f_password" type="password">
								<label for="f_password">Password</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
								<a id="act_login" class="btn pulse waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="content-overlay"></div>
			</div>
		</div>  
	</body>
</html>
<script>
	$(document).ready(function(){

		$("#f_username").on( "keydown", function(event) {
			if(event.which == 13)
			{
				$("#password").focus();
			} 
		});	

		$("#f_password" ).on( "keydown", function(event) {
			if(event.which == 13)
			{
				login();
			} 
		});		

		$("#act_login").click(function() {		
			login();
		})
	});

	function login() {
		var username = $("#f_username").val();
		var password = $("#f_password").val();
		if(username.length <= 0 || password.length <= 0)
		{
			if (username.length <= 0) {
				Notiflix.Notify.Failure('Username wajib diisi')
			}
			else if(password.length <= 0)
			{
				Notiflix.Notify.Failure('Password wajib diisi')
			}

		}
		else
		{
			var data_sender = {
				username: username,
				password: password				
			}

			state_process('before_send')		
			axios.post('<?=base_url();?>'+'auth/process', data_sender)
			.then(function (response) {
				if (response.status == 200) {
					send_response(response,'report');
					if (response.data.status == true) {					
						setTimeout(function(){
							open_main_route('auth','redirect')							
						}, 1500);
					}
				}
			})
			.catch(function (error) {
				send_response(error.response,'report');
			});			
		}						
	}
</script>
