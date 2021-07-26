<?php $this->load->view('admin_layout/header');?>
<?php
$pageName = "Product Manage";
$calledName = "Customer";
$heading = "Product Management";
$key = "id";
$tableName='e_product';
$fields = array('Product Name','Status');

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
								<div class="card">
									<div class="card-header"><?=$heading?>
                                     <a href="<?=base_url()?>Admin/product_add" class='btn btn-primary btn-sm float-right'>Add</a> </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<span id="flash_data"></span>
										<table id="datatable" class="table table-striped table-bordered">
											<thead class="spThead">
												<tr>
													<?php foreach ($fields as $field): ?>
														<th><?=$field?></th>
													<?php endforeach ?>
													<th>Image</th>
													<th>Stock</th>
													<th></th>

												</tr>
											</thead>
											<tbody class="spTbody">
											<?php foreach ($data as $row):?>
											  <tr id="row<?=$row->id?>">
												<td><?=$row->name?></td>
												<td><?=$row->status?></td>
												<td><img class="img-thumbnail"  src="<?=base_url().'assets/cms_images/thumbnail/'.$row->image?>"></td>
												<td > <span class="badge <?=($row->stock)?'badge-primary':'badge-danger'?>  text-center  "><?=$row->stock?></span>
												 </td>
												<td style="padding: 2px;text-align: center;" width="15%">
														<a href="<?=base_url()?>Admin/product_edit/<?=$row->id?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Record"  class="btn btn-outline-success btn-sm"><span class="icon-edit" ></span>
													</a>
													
													<button class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record" onclick="deleteRecord('<?=$key?>',<?=$row->id?>,'<?=$tableName?>')"><span class="icon-trash2" ></span>
													</button>			
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




				</div>

<script type="text/javascript">
	function update(id)
{
	var viewType  = 'edit<?=$calledName?>';
	var tableName = '<?=$tableName?>';
	var key       = '<?=$key?>';

	$("#extraModel").modal();
	$("#extraTitle").html("Edit <?=$heading?>");
	$("#extraBoday").html("<h2 class='text-center'><span class='icon-spinner3'></span></h2>");
	$.post("<?php echo base_url(); ?>Function_control/getView2",{viewType,id,tableName,key}, 
		function(data)
		{
			$("#extraBoday").html(data); 	
			//$('#myModal').modal('hide');
		});
}
function deleteRecord(key,value,tableName)
{
	// var file = 'image';
	// var file_path = 'assets/cms_imagess/';
	if (confirm("Are you sure to delete?"))
	{  
		$.post("<?php echo base_url(); ?>AjaxRequest/deleteproduct",{key,value,tableName}, 
			function(data)
			{
				//alert(data);
				$("#row"+value).hide();
				$("#flash_data").html(data);
				notes.show("Product Delete succesfully!", {
					type: 'info',
					title: 'Remove',
					icon: '<i class="icon-info-large-outline"></i>'
				});
			});
	}
}
function addNew()
{
	$("#addModal").modal();
}

function form_validation() 
{   
   //var value = CKEDITOR.instances['editor1'].getData();
   //$("#editorReplace").val(value);
    var form = new FormData($('#myForm')[0]);
    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>Function_control/saveUser',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res)
      {
      	//alert(res);
      	location.reload();
       
       }
       
    });
      return false;
}  

function update_validation() 
{   
   //var value = CKEDITOR.instances['editor1'].getData();
   //$("#editorReplace").val(value);
    var form = new FormData($('#updateForm')[0]);
    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>Function_control/updateSimple',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res)
      {
      	location.reload();
      }
       
    });
      return false;
}
</script>
<?php $this->load->view('admin_layout/footer');?>