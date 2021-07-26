<?php $this->load->view('admin_layout/header');?>
<?php


$heading = "Edit user";

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
                                    <a href="<?=base_url()?>Admin/customer" class='btn btn-primary btn-sm float-right'>Back</a>
                                     </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<div class="" id="flash_data"></div>
                                        
                                        <?= validation_errors(); ?>
				<form method="POST" name="myForm" id="myForm"  enctype="multipart/form-data" onsubmit="return form_validation()">
		           <div class="form-group row">
                   <input class="form-control" type="hidden" name="id" value="<?=$user->user_id?>">
		          
		            <div class="col-md-4">
		              <label class="col-form-label">Full Name</label>
		              <input type="text"  name="name" value="<?=$user->name?>"  required  class="form-control-sm form-control">
		            </div>
		            <div class="col-md-4">
		              <label class="col-form-label">Email</label>
		              <input type="text"  name="email" value="<?=$user->email?>"  required class="form-control-sm form-control">
		            </div>
		            <div class="col-md-4">
		              <label class="col-form-label">Role</label>
		              <select class="form-control-sm form-control" name="role" >
		              	<option value="">Select Option</option>
		              	<option <?=($user->role=='sub_admin')?' selected':''?>  value="sub_admin">Sub Admin </option>
		              	<option <?=($user->role=='Salesman')?' selected':''?>  value="Salesman">Salesman </option>
		              	<option <?=($user->role=='Sales_Coordinator')?' selected':''?>  value="Sales_Coordinator">Sales Coordinator  </option>
		              	<option <?=($user->role=='Dispatcher')?' selected':''?>  value="Dispatcher">Dispatcher </option>
		              	<option <?=($user->role=='Dealer')?'selected':''?>  value="Dealer">Dealer </option>
		              </select>
		            </div>
		          </div>
		          <div class="form-group row">
		            
		            <div class="col-md-4">
		               <label class="col-form-label">City</label>
		              <input type="text"  name="city" value="<?=$user->city?>" required  class="form-control-sm form-control">
		            </div>
		            
		            <div class="col-md-4">
		               <label class="col-form-label">Phone</label>
		              <input type="text"  name="phone" value="<?=$user->phone?>" required  class="form-control-sm form-control">
		            </div>
		            <div class="col-md-4">
		              <label class="col-form-label">Status</label>
		              <select class="form-control-sm form-control" name="status" >
		              	<option value="">Select Option</option>
		              	<option <?=($user->status=='Active')?'selected':''?> value="Active">Active </option>
		              	<option <?=($user->status=='In-Active')?'selected':''?> value="In-Active "> In Active  </option>
		              			              	
		              </select>
		            </div>
		          </div>
		          <div class="form-group row">
		            <div class="col-md-6">
		              <label class="col-form-label">Address</label>
		              <input type="text"  name="address" required value="<?=$user->address?>"  class="form-control-sm form-control">
		            </div>
					<div class="col-md-6">
		              <label class="col-form-label">New Password</label>
		              <input type="text"  name="new_password"   class="form-control-sm form-control">
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
      url: '<?php echo base_url(); ?>AjaxRequest/updateUser',
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
            window.location.href='<?=base_url()?>Admin/customer';
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
