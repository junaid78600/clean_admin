<?php  
$CI =& get_instance();
$controler=$this->uri->segment(1);
 $function=$this->uri->segment(2);
?>

<!doctype html>
<html lang="en">
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="<?=base_url().'assets/cms_images/'.$settings['icon'];?>" />
		<title> Admin Dashboard</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		
		<!-- Common CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/fonts/icomoon/icomoon.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/css/main.css" />

		<!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
		<!-- Data Tables -->
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/vendor/datatables/dataTables.bs4.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/vendor/datatables/dataTables.bs4-custom.css" />
		<!-- Chartist css -->
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/vendor/c3/c3.min.css" />
		<!-- notification -->
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/vendor/notify/notify-flat.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/cms_layout/css/bootstrap-datetimepicker.min.css" />


	</head>
	<body>

				<!-- Loading starts -->
		<div id="loading-wrapper">
			<div id="loader">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
				<div class="line4"></div>
				<div class="line5"></div>
				<div class="line6"></div>
			</div>
		</div>
		<!-- Loading ends -->

		<!-- BEGIN .app-wrap -->
		<div class="app-wrap">
			<!-- BEGIN .app-heading -->
			<header class="app-header">
				<div class="container-fluid">
					<div class="row gutters">
						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
							<a class="mini-nav-btn" href="#" id="app-side-mini-toggler">
								<i class="icon-menu5"></i>
							</a>
							<a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
								<i class="icon-chevron-thin-left"></i>
							</a>
						
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-4">
							<a href="<?php echo base_url(); ?>" class="logo">
								<img src="<?=base_url().'assets/cms_images/'.$settings['image'];?>" alt="Admin Dashboard" />
							</a>
						</div>
						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">

							<ul class="header-actions">
								
								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										
										<img class="avatar" src="<?=base_url()?>assets/cms_images/<?=$userData['image']?>" alt="User Thumb" />
										<span class="user-name"><?=$userData['name']?></span>
										<i class="icon-chevron-small-down"></i>
									</a>
									<div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
										<ul class="user-settings-list">
											 
											 <?php if($userData['role']=='Admin'):?>
											
											<li>
												<a href="<?=base_url().'Admin/settings'?>">
													<div class="icon red">
														<i class="icon-cog3"></i>
													</div>
													<p>Settings</p>
												</a>
											</li>
                                       <?php endif;?>
											
										</ul>
										<div class="logout-btn">
											<a href="<?=base_url()?>AdminLogin/logout" class="btn btn-primary">Logout</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<!-- END: .app-heading -->
			<!-- BEGIN .app-container -->
			<div class="app-container">
				<!-- BEGIN .app-side -->
				<aside class="app-side" id="app-side">
					<!-- BEGIN .side-content -->
					<div class="side-content ">
						<!-- BEGIN .user-profile -->
						<div class="user-profile">
							<img src="<?=base_url()?>assets/cms_images/<?=$userData['image']?>" class="profile-thumb" alt="User Thumb">
							<h6 class="profile-name"><?=$userData['name']?></h6>
							
						</div>
						<!-- END .user-profile -->
						<!-- BEGIN .side-nav -->
						<nav class="side-nav">
							<!-- BEGIN: side-nav-content -->
							<ul class="unifyMenu" id="unifyMenu">
								
								<li <?php if($controler=='Admin' && ( $function == "index" || $function == "")){echo 'class="active selected"';}?>>
									<a href="<?=base_url()?>Admin/index" >
										<span class="has-icon">
											<i class="icon-laptop_windows"></i>
										</span>
										<span class="nav-title">Dashboard</span>
									</a>
								</li>
								<li <?php if($controler=='Admin' && ( $function == "order" )){echo 'class="active selected"';}?>>
									<a href="<?=base_url()?>Admin/order" >
										<span class="has-icon">
											<i class="icon-laptop_windows"></i>
										</span>
										<span class="nav-title">Store</span>
									</a>
								</li>
								<?php if($userData['role']=='Admin'):?>
								<li <?php if($controler=='Admin' && $function=='cms_user')
								{
									echo 'class="active selected"';}?>>
									<a href="<?=base_url()?>Admin/cms_user" >
										<span class="has-icon">
											<i class="icon-user"></i>
										</span>
										<span class="nav-title">CMS Admin</span>
									</a>
								</li>
								<li  <?php if($controler=='Admin' && $function=='customer'||$function=='user_edit'||$function=='user_add')
								       {
									echo 'class="active selected"';}?>>
									<a href="<?=base_url()?>Admin/customer">
										<span class="has-icon">
											<i class="icon-users"></i>
										</span>
										<span class="nav-title">User List</span>
									</a>
								</li>
								<li  <?php if($controler=='Admin' && $function=='city'||$function=='city_edit'||$function=='city_add')
								       {
									echo 'class="active selected"';}?>>
									<a href="<?=base_url()?>Admin/city">
										<span class="has-icon">
											<i class="icon-flag"></i>
										</span>
										<span class="nav-title">City List</span>
									</a>
								</li>
								<li <?php if($controler=='Admin' && $function=='orderlist'||$function=='orderaccept'||$function=='orderrejected'||$function=='orderdetails'||$function=='orderdispatch'){echo 'class="active selected"';}?>>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-cart"></i>
										</span>
										<span class="nav-title">Order </span>
									</a>
									<ul aria-expanded="false" <?php if($controler=='Admin' && ($function=='orderlist'||$function=='orderaccept'||$function=='orderrejected'||$function=='order_complete' )){echo 'class="collapse in"';}?>>
										<li>
											<a <?php  if( $function=='orderaccept'){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/orderaccept">New Order</a>
										</li>
										<li>
											<a <?php  if( $function=='orderrejected'){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/orderrejected">Rejected Order</a>
										</li>
										<li>
											<a <?php  if( $function=='orderdispatch'){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/orderdispatch">Dispatch Order</a>
										</li>
										<li>
											<a <?php  if( $function=='order_complete'){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/order_complete">Complete Order</a>
										</li>
										<li>
											<a <?php  if( $function=='orderlist'){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/orderlist">All Order</a>
										</li>
										
										
									</ul>
								</li>
								
								
								<li <?php if($controler=='Admin' && $function=='product'||$function=='product_add'||$function=='product_edit'||$function=='product_out_of_stock'){echo 'class="active selected"';}?>>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-cart"></i>
										</span>
										<span class="nav-title">Product List</span>
									</a>
									<ul aria-expanded="false" <?php if($controler=='Admin' && ($function=='product'||$function=='product_add'||$function=='product_edit'||$function=='product_out_of_stock' )){echo 'class="collapse in"';}?>>
										<li>
											<a <?php  if( $function=='product'){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/product">In stock Product</a>
										</li>
										<li>
											<a <?php  if( $function == "product_out_of_stock"){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/product_out_of_stock">Out Stock Product</a>
										</li>
										
									</ul>
								</li>
								

								<li <?php if($controler=='Admin' && ( $function == 'dealer'||$function=='dealer_dashboard' )){echo 'class="active selected"';}?>>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-chart-area-outline"></i>
										</span>
										<span class="nav-title">Payment</span>
									</a>
									<ul aria-expanded="false" <?php if($controler=='Admin' && ( $function == 'dealer'||$function=='dealer_dashboard'  )){echo 'class="collapse in"';}?>>
										<li>
											<a <?php  if( $function == "dealer"){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/dealer">Dealer List</a>
										</li>
										
										
									</ul>
								</li>

								<li <?php if($controler=='Admin' && ( $function == 'dealer_bil'||$function=='saleman_bil' )){echo 'class="active selected"';}?>>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-chart-area-outline"></i>
										</span>
										<span class="nav-title">Report</span>
									</a>
									<ul aria-expanded="false" <?php if($controler=='Admin' && ( $function == 'saleman_bil'||$function=='dealer_bil'  )){echo 'class="collapse in"';}?>>
										<li>
											<a <?php  if( $function == "dealer_bil"){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/dealer_bil">Dealer Report List</a>
										</li>
										<li>
											<a <?php  if( $function == "saleman_bil"){echo 'class="current-page"';}?> href="<?=base_url()?>Admin/saleman_bil">Saleman  Report List</a>
										</li>
										
									</ul>
								</li>

								
							<?php endif;?>
							
							</ul>
							<!-- END: side-nav-content -->
						</nav>
						<!-- END: .side-nav -->
					</div>
					<!-- END: .side-content -->
				</aside>
				<!-- END: .app-side -->

				
			