<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-tap-highlight" content="no">
		
		<meta name="description" content="">
		<meta name="keywords" content="">
		
		<title>Sikerja</title>
		<!-- Favicons-->
		<link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
		<!-- Favicons-->
		<link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
		<!-- For iPhone -->
		<meta name="msapplication-TileColor" content="#00bcd4">
		<meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
		<!-- For Windows Phone -->
		<!-- CORE CSS-->
		<script src="<?=base_url();?>bundle.js"></script>	
		<?=$this->load->view('templates/css_library');?>	
		<?=$this->load->view('templates/js_library');?>
	</head>
	<body class="vertical-layout menu-collapse vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns" >
		<?=$this->load->view('templates/preloader');?>
		<header class="page-topbar" id="header">
			<?=$this->load->view('templates/navbar');?>
		</header>

		<?=$this->load->view('templates/aside_left');?>

		<!-- START MAIN -->
		<div id="main">
			<div class="row">
				<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
				<div class="col s12">
					<div class="progress">
						<div class="indeterminate"></div>
					</div>				
					<?=$this->load->view('templates/breadcrumbs',$breadcrumbs);?>				
					<div class="container">
						<div class="container" id="main_content">
							<?php $this->load->view($content);?>                    
						</div>
					</div>

					<?=$this->load->view('templates/aside_right');?>
				</div>
			</div>

		</div>
		<!-- END MAIN -->
		<?=$this->load->view('templates/footer');?>
	</body>
</html>
