<?php $this->load->view('site_layout/header');?>
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
										<h5>CMS Power User</h5>
										<h6 class="sub-heading">Welcome to CMS User Managment</h6>
									</div>
								</div>
								
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">CMS User <button class='btn btn-primary btn-sm float-right' onclick="addNew()">Add</button></div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<span id="flash_data"></span>
										<table id="datatable" class="table table-striped table-bordered">
											<thead class="spThead">
												<tr>
													<th width="1%">ID</th>
													<th>Name</th>
													<th>Username</th>
													<th>status</th>
													<th>email</th>
													<th>Role</th>
													
													<th>Image</th>
													<th></th>
												</tr>
											</thead>
											<tbody class="spTbody">
											</tbody>
										</table>
									</div>
								</div>
							</div>
					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->

<?php $this->load->view('site_layout/footer');?>
