<?php $this->load->view('admin_layout/header');?>
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
										<h5><?=$heading?></h5>
										<h6 class="sub-heading">Welcome to <?=$heading?> Managment</h6>
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
									<div class="card-header"><?=$heading?> 
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
													<th>Status</th>
													<th></th>

												</tr>
											</thead>
											<tbody class="spTbody">
											<?php foreach ($orderList as $row):?>
											  <tr id="row<?=$row['id']?>">
                                              <td style="display:none" ><?=$row->id?></td>
												<td > <a class="text-success" href="<?=base_url()?>admin/orderdetails/<?=$row->id?>"> <?=$row->order_no?></a> </td>
												<td><?=$row->create_at?></td>
												<td><?=$row->status?></td>
												
												<td style="padding: 2px;text-align: center;" width="15%">
														<a href="<?=base_url()?>admin/orderdetails/<?=$row->id?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Order Details"  class="btn btn-outline-success btn-sm"><span class="icon-eye" ></span>
													</a>
													
													<!-- <button class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record" onclick="deleteRecord('id',<?=$row['id']?>,'e_orders')"><span class="icon-trash2" ></span>
													</button>			 -->
												</td>
											</tr>
											<?php endforeach ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
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
});
</script>
