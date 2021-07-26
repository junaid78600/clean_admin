<?php $this->load->view('admin_layout/header');?>
<?php


$heading = "Edit City";

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
                                    <a href="<?=base_url()?>Admin/city" class='btn btn-primary btn-sm float-right'>Back</a>
                                     </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<div class="" id="flash_data"></div>
                                        
                                        <?= validation_errors(); ?>
				<form method="POST" name="myForm" id="myForm"  enctype="multipart/form-data" onsubmit="return form_validation()">
		           <div class="form-group row">
                   <input class="form-control" type="hidden" name="id" value="<?=$city->id?>">
		          
		            <div class="col-md-4">
		              <label class="col-form-label">City Name</label>
		              <input type="text"  name="city_name" value="<?=$city->city_name?>"  required  class="form-control-sm form-control">
		            </div>
		            
		          </div>
		          

		         
		         
		 		<div class="form-group row">
		            <div class="col-md-12">
		     
		                 <button type="submit" class="float-right btn btn-primary btn-sm ">Update Data</button>
		            </div>
		          </div>  
		        </form>
										
									</div>
								</div>
							</div>
					</div>
					<!-- END: .main-content -->
				</div>




				</div>

<script type="text/javascript">



function form_validation() 
{   
    $("#flash_data").html('');
   
    var form = new FormData($('#myForm')[0]);
    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>AjaxRequest/updateCity',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res)
      {
        //   console.log(res);
          let data=JSON.parse(res);
          console.log(data);
          if(data.status==1)
          {
            //  location.reload('user');
            window.location.href='<?=base_url()?>Admin/city';
          }else
          {     
            $("#flash_data").addClass('text-danger');

              $("#flash_data").html(data.data);
          }
      	//alert(res);
      	// location.reload();
       
       }
       
    });
      return false;
}  
</script>
<?php $this->load->view('admin_layout/footer');?>
