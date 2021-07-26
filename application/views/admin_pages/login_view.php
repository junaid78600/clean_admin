<!doctype html>
<html lang="en">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content=" Admin Panel" />
		<meta name="keywords" content="" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="img/favicon.ico" />
		<title>  Dashboard - Login</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		
		<!-- Common CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/fonts/icomoon/icomoon.css" />

		<!-- Mian and Login css -->
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/css/main.css" />

	</head>  

	<body class="">
			
		<div class="container">
			<div class="login-screen row align-items-center" style="width: 444px;margin: auto;">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<form  action="<?=base_url();?>AdminLogin/authenticate_login" method="post">
						<div class="login-container">
							<div class="row no-gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="login-box">
										<a href="#" class="login-logo">
											<img src="<?=base_url().'assets/cms_images/'.$settings['image'];?>" alt="Admin Dashboard" />
										</a>
										<div class="input-group">
											<span class="input-group-addon" id="username"><i class="icon-account_circle"></i></span>
											<input type="text" class="form-control" name="username" placeholder="Username" aria-label="username" aria-describedby="username" required>
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
											<input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" aria-describedby="password" required>
										</div>
										<div class="actions clearfix">
											<!-- <a href="">Lost password?</a> -->
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
										<!-- <div class="or"></div> -->
										<div class="mt-4">
									<?php 
									echo show_flash_data();
									// $alert_data =  $this->session->flashdata('alert_data');
								 //  	echo $alert_data['details'];
							 		?>
											<!-- <a href="signup.html" class="additional-link">Don't have an Account? <span>Create Now</span></a> -->
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<footer class="main-footer no-bdr fixed-btm">
			<div class="container">
				Copyright <?php echo $settings['siteName']; ?> <?php echo date('Y') ?></a> 
				
			</div>
		</footer>
	</body>

</html>