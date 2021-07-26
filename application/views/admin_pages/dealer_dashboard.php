<?php $this->load->view('admin_layout/header');?>


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
										<h5 class="text-capitalize"><?=$data->name ?> Dashboard</h5>
										<h6 class="sub-heading">Email:<?=$data->email?>  Phone: <?=$data->phone?></h6>
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
												<i class="icon-cart"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Total Order</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total"><?=$data->orders->count() ?></h4>
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
												<i class="icon-shop"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Total Amount</h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total"><?= number_format($data->orders->sum('total_order_price')) ?></h4>
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
														<h6 class="title">Receive </h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total"><?=number_format($data->payment->sum('amount')) ?></h4>
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
												<i class="icon-cart"></i>
											</div>
											<div class="stats-widget-body">
												<!-- Row start -->
												<ul class="row no-gutters">
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h6 class="title">Remaning  </h6>
													</li>
													<li class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
														<h4 class="total"><?= number_format($data->orders->sum('total_order_price')-$data->payment->sum('amount')) ?></h4>
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
							
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="card">
									<div class="card-header">Order List 
                                    </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<span id="flash_data"></span>
										<table id="orderList" class="table table-striped table-bordered">
											<thead class="spThead">
												<tr>
                                                <th style="display:none" ></th>
													<th>Order No</th>
                                                    <th>Order Date</th>
                                                    <th>Amount</th>
													<th>Status</th>
													<th></th>

												</tr>
											</thead>
											<tbody class="spTbody">
											<?php foreach ($data->orders as $row):?>
											  <tr id="row<?=$row->id?>">
                                              <td style="display:none" ><?=$row->id?></td>
												<td > <a target="blank" class="text-success" href="<?=base_url()?>admin/orderdetails/<?=$row->id?>"> <?=$row->order_no?></a> </td>
												<td><?=$row->create_at?></td>
												<td><?=$row->total_order_price?></td>
												<td><?=$row->status?></td>
												
												<td style="padding: 2px;text-align: center;" width="15%">
														<a target="blank" href="<?=base_url()?>admin/orderdetails/<?=$row->id?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Order Details"  class="btn btn-outline-success btn-sm"><span class="icon-eye" ></span>
													</a>
													
												</td>
											</tr>
											<?php endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="card">
									<div class="card-header">Payment Record 
                                    </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<span id="flash_data"></span>
										<table id="payment" class="table table-striped table-bordered">
											<thead class="spThead">
												<tr>
                                                <th style="display:none" ></th>
													<th>Payment Date</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
													<th>Saleman</th>

												</tr>
											</thead>
											<tbody class="spTbody">
											<?php foreach ($data->payment as $row):?>
											  <tr id="row<?=$row->id?>">
                                              <td style="display:none" ><?=$row->id?></td>
												<td >  <?=$row->create_at?> </td>
												<td><?=$row->amount?></td>
												<td><?=$row->type?></td>
												<td><?=$row->saleman->name?></td>
												
												
											</tr>
											<?php endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>
						<!-- Row end -->
					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
				
<?php $this->load->view('admin_layout/footer');?>

<script>
$(function(){
	$('#orderList').DataTable({
		'iDisplayLength': 50,
        'order':[0,'desc']
	});
	$('#payment').DataTable({
		'iDisplayLength': 50,
        'order':[0,'desc']
	});
});
</script>
