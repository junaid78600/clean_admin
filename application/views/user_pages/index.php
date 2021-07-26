<?php $this->load->view('user_layout/header');?>


<!-- BEGIN .app-main -->
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					<header class="main-heading">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
									<div class="page-icon">
										<i class="icon-laptop_windows"></i>
									</div>
									<div class="page-title">
										<h5>Dashboard</h5>
										<h6 class="sub-heading">Welcome to <?php echo $settings['siteName']; ?></h6>
									</div>
								</div>
								
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<!-- Row start -->
						<?php if($userData['role']=='Admin'):?>
						<div class="row gutters">
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<div class="stats-widget-header">
												<i class="icon-pricetags"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Projects</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total"><?php //echo countRows('e_project'); ?></h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											<div class="stats-widget-header">
												<i class="icon-profile-male"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Worker</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total"><?php //echo countRows('e_admin',array('role'=>'User')); ?></h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											
											<div class="stats-widget-header">
												<i class="icon-pricetags"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Task</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total"><?php //echo countRows('e_task'); ?></h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
								<div class="card">
									<div class="card-body">
										<div class="stats-widget">
											
											<div class="stats-widget-header">
												
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
													
														<div id='date-part'></div>
                                                          <div id='time-part'></div>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total"id="time">
															 
															<?php //echo countRows('e_contact_us'); ?></h4>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

							
						</div>
					<?php endif;?>
						<!-- Row end -->
						<!-- Row start -->
					

						<div class="row gutters">
							
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Overview</div>
									<div class="card-body text-center" style="min-height: 222px">
										<!-- Row start -->
										<br><br><br>
										<h2 class="mx-auto center">Welcome to User Panel</h2>
										
										
										
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->
					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
				
<?php $this->load->view('user_layout/footer');?>

<script type="text/javascript">
	$(document).ready(function() {
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                            + momentNow.format('dddd')
                             .substring(0,3).toUpperCase());
        $('#time-part').html(momentNow.format('A hh:mm:ss'));
    }, 100);
    
    $('#stop-interval').on('click', function() {
        clearInterval(interval);
    });
});
</script>