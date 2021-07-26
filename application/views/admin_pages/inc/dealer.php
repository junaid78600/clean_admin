<div class="modal fade " id="addModal" tabindex="-1" role="dialog" aria-labelledby="map12" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content brad0">
			<div class="modal-header brad0">
				<h5 class="modal-title" id="addTitle">Add New</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body" id="addBody">
				 <?= validation_errors(); ?>
				 <div class="" id="flash_data"></div>
				<form method="POST" name="myForm" id="myForm"  enctype="multipart/form-data" onsubmit="return form_validation()">
		           <div class="form-group row">
		           	<input type="hidden" name="role" value="Dealer">
		          
		            <div class="col-md-4">
		              <label class="col-form-label">Full Name</label>
		              <input type="text"  name="name"  required  class="form-control-sm form-control">
		            </div>
		            <div class="col-md-4">
		              <label class="col-form-label">Email</label>
		              <input type="text"  name="email"  required class="form-control-sm form-control">
		            </div>
		            <div class="col-md-4">
		               <label class="col-form-label">City</label>
		              <input type="text"  name="city" required  class="form-control-sm form-control">
		            </div>
		          </div>
		          <div class="form-group row">
		            
		            
		            
		            <div class="col-md-4">
		               <label class="col-form-label">Phone</label>
		              <input type="text"  name="phone" required  class="form-control-sm form-control">
		            </div>
		            <div class="col-md-4">
		              <label class="col-form-label">Status</label>
		              <select class="form-control-sm form-control" name="status" >
		              	
		              	<option  value="Active">Active </option>
		              	<option  value="In-Active "> In Active  </option>
		              			              	
		              </select>
		            </div>
		            <div class="col-md-4">
		              <label class="col-form-label">Address</label>
		              <input type="text"  name="address" required  class="form-control-sm form-control">
		            </div>
		          </div>
		          <div class="form-group row">
		            
					<div class="col-md-6">
		              <label class="col-form-label">Password</label>
		              <input type="text"  name="password" required  class="form-control-sm form-control">
		            </div>
                    <div class="col-md-6">
		              <label class="col-form-label">Confirm Password</label>
		              <input type="text"  name="confirm_password" required  class="form-control-sm form-control">
		            </div>
		            
		          </div>


		         
		         
		 		<div class="form-group row">
		            <div class="col-md-12">
		     
		                 <button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
		            </div>
		          </div>  
		        </form>
			</div>					
		</div>
	</div>
</div>
<script type="text/javascript">
	function addNew()
{
	$("#addModal").modal();
}

function form_validation() 
{   
    $("#flash_data").html('');
   
    var form = new FormData($('#myForm')[0]);
    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>AjaxRequest/saveUser',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res)
      {
        //   console.log(res);
          let data=JSON.parse(res);
          console.log(data);
          // return false;
          if(data.status==1)
          {
             location.reload();
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