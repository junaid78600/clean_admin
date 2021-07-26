<?php $this->load->view('user_layout/header');?>
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
									<button type="button" id="make_order" class=" ml-5 btn btn-outline-primary btn-lg|sm">Dispatch Order</button>
                                    </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<span id="flash_data"></span>
										<table id="orderList" class="table table-striped table-bordered">
											<thead class="spThead">
												<tr>
                                                <th style="display:none" ></th>
                                                <th></th>
													<th>Order No</th>
													<th>Shipping Address</th>
													<th>Transpoter</th>
                                                    <th>Order Date</th>
													<th>Status</th>
													<th></th>

												</tr>
											</thead>
											<tbody class="spTbody">
											<?php foreach ($orderList as $row):
												?>
											  <tr  id="row<?=$row['id']?>">
                                              <td data-id="<?=$row['id']?>"> <input type="checkbox" name=""></td>
                                              <td style="display:none" ><?=$row->id?></td>
												<td > <a class="text-success" href="<?=base_url()?>user/orderdetails/<?=$row->id?>"> <?=$row->order_no?></a> </td>
												<td><?=$row->shipping->shipping_address?></td>
												<td><?=$row->shipping->transpoter_name?></td>
												<td><?=$row->create_at?></td>
												<td><?=$row->status?></td>
												
												<td style="padding: 2px;text-align: center;" width="15%">
														<a href="<?=base_url()?>user/orderdetails/<?=$row->id?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Order Details"  class="btn btn-outline-success btn-sm"><span class="icon-eye" ></span>
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
<?php $this->load->view('user_layout/footer');?>
<script>
$(function(){
	$('#orderList').DataTable({
		'iDisplayLength': 50,
        'order':[1,'desc']
	});
});

$('#make_order').on('click', function() {
    var checkedRows = [];
    $(':checkbox:checked').closest('tr').each(function() {
        checkedRows.push(
          $(this).find('td:first').map(function() {
              return $(this).data('id');
          }).get()
        ); 
     });

   if(checkedRows.length==0)
   {
   	alert('please select Order for Transport shipping')
   	return false;
   }
   if(checkedRows.length>0)
   {

   	if(confirm('Are u sure to Transport selected order'))

   		$.post('<?=base_url()?>AjaxRequest/shipped_orders',{'data':checkedRows.join(',')}, function(data, textStatus, xhr) {
   			/*optional stuff to do after success */
   			$.each(checkedRows, function(index, val) {
   				$('#row'+val+'').hide()
   				
   			});
   			notes.show("Action success", {
                    type: 'success',
                    title: 'Orders Successfully Shipped ',
                    icon: '<i class="icon-info-outline"></i>'
                });
   		});

   }
});
</script>
