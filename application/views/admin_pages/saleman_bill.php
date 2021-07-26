<?php $this->load->view('admin_layout/header');?>
<?php

$key = "id";
$tableName='e_product';

?>

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
								<div class="card text-white bg-primary">
									<div class="card-header">
										Filter
									</div>
									<div class="card-body">
										<form>
										<div class="row">
											 <div class="col-3">
												<label>Select Saleman</label>
												<select class="form-control" name="user">
													

													<?php foreach ($deakerList as $key => $value): ?>
														
													<option <?php if(!empty($_GET['user'])&&$_GET['user']!='all'&&$_GET['user']==$value->user_id){ echo('selected');}?>  value="<?=$value->user_id?>"><?=$value->name?>  
													</option>
													<?php endforeach ?>
												</select>
											</div> 
											<div class=" col-sm-7">
												<div class="row">
											<div class="col-sm-4">
												<label>From date</label>

												<input type="date" name="from" value="<?=(!empty($_GET['from']))?$_GET['from']:date('Y-m-d')?>" class="form-control">
											</div>
											<div class="col-sm-4">
												<label>To date</label>
												<input type="date" name="to" value="<?=(!empty($_GET['to']))?$_GET['to']:date('Y-m-d')?>" class="form-control">
												
											</div>
											<div class="col-sm-4 mt-4">
												<button type="submit" class="btn mt-2">submit</button>
											</div>
										</div>
										
									</div>
											<div class="col-2 mt-4">
												<a href="<?=base_url()?>Admin/saleman_bil" class="btn bg-white mt-2">Clear</a>
											</div>
										</div>
										</form>
									</div>
								</div>
								<div class="card">
									<div class="card-header">
										<?=$heading?>
                                     </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<span id="flash_data"></span>
										<table id="orderList" class="table table-striped table-bordered">
											<thead class="spThead">
												<tr>
                                                <th style="display:none" ></th>
													<th>Payment Date</th>
													<th>Dealer</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
													<th>Saleman</th>

												</tr>
											</thead>
											<tbody class="spTbody">
											<?php foreach ($payment as $row):?>
											  <tr id="row<?=$row->id?>">
                                              <td style="display:none" ><?=$row->id?></td>
												<td >  <?=$row->create_at?> </td>
												<td><?=$row->dealer->name?></td>
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
					<!-- END: .main-content -->
				</div>




				</div>

<?php $this->load->view('admin_layout/footer');?>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script>
$(function(){
	$('#orderList').DataTable({
		'iDisplayLength': 50,
        'order':[0,'desc'],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
	});
	
});
</script>