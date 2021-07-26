<?php  $CI =& get_instance(); ?>
<?php if ($viewType == "editCustomer"): extract($data);?>
	 <form method="POST" name="updateForm" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		          
		 <input type="hidden" name="tableName" value="<?=$tableName?>">
		<input type="hidden" name="keyIndex" value="<?=$key?>">
		<input type="hidden" name="<?=$key?>" value="<?=$id?>">
		<div class="form-group row">
		            <div class="col-md-6">
		              <label class="col-form-label">Full Name</label>
		              <input type="text"  name="name" required  value="<?=$name?>" class="form-control-sm form-control">
		            </div>
		            <div class="col-md-6">
		              <label class="col-form-label">Email</label>
		              <input type="text"  name="email"  required value="<?=$email?>" class="form-control-sm form-control">
		            </div>
		          </div>
		          <div class="form-group row">
		            
		            <div class="col-md-6">
		               <label class="col-form-label">City</label>
		              <input type="text"  name="city" required value="<?=$city?>"  class="form-control-sm form-control">
		            </div>
		            
		            <div class="col-md-6">
		               <label class="col-form-label">Phone</label>
		              <input type="text"  name="phone" required  value="<?=$phone?>" class="form-control-sm form-control">
		            </div>
		          </div>
		          <div class="form-group row">
		            <div class="col-md-6">
		              <label class="col-form-label">Address</label>
		              <input type="text"  name="address" required  value="<?=$address?>" class="form-control-sm form-control">
		            </div>
					<div class="col-md-6">
		              <label class="col-form-label">New Password</label>
		              <input type="text"  name="password"   class="form-control-sm form-control">
		            </div>
					<div class="col-md-6">
		               <label class="col-form-label">Status</label>
		              <select name="status" class="form-control form-control-sm">
		              	<option value="Active">Active</option>
		              	<option value="In-Active" <?php if($status == 'In-Active') echo "selected"?>>in-Active</option>
		              </select>
		            </div>
		          </div>  
		            
		          </div>
				  <div class="form-group row">
							            <div class="col-md-12">
							     		  <button type="submit" class=" btn btn-primary float-right btn-sm ">Save Data</button>
							            </div>
							          </div> 
		
		        </form>
<?php endif ?>

<?php if ($viewType == 'editgallery'): extract($data) ?>
	<form method="POST" name="updateForm" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		           <div class="form-group row">
		            <div class="col-md-12">
		            	<input type="hidden" name="tableName" value="<?=$tableName?>">
		<input type="hidden" name="keyIndex" value="<?=$key?>">
		<input type="hidden" name="<?=$key?>" value="<?=$id?>">
		              <label class="col-form-label">Title</label>
		              <input type="text" requiredd name="title" value="<?=$title?>"  class="form-control-sm form-control">
		            </div>
		        </div>
		           <div class="form-group row">
		            <div class="col-md-12">
		            	<label class="col-form-label">Category</label>
          				<select name="category" class="form-control form-control-sm">
		             		<?php getOption('e_gallery_cat','gcat_id','category',$category) ?>
		             	</select>
		            </div>

		            
		          </div>  
		           <div class="form-group row">
		         
		            <div class="col-md-4">
					<label class="col-form-label">Image</label>
		              <input type="file" id="image2"   name="files"  class="form-control-sm input-sm form-control">
		            </div>
			        
		            <span class="preview-area2">
		            	<?php if ($image): ?>
		           	<img src="<?=base_url().'assets/cms_images/thumbnail/'.$image?>">
		           <?php endif ?>
		            </span>
		        </div>
		           
		         
		 		<div class="form-group row">
		            <div class="col-md-12">
		     
		                 <button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
		            </div>
		          </div>  
		        </form>


<script type="text/javascript">
var inputLocalFont2= document.getElementById("image2");
inputLocalFont2.addEventListener("change",previewImages2,false);
function previewImages2(){
    var fileList = this.files;
    var anyWindow = window.URL || window.webkitURL;
$('.preview-area2').html('');
        for(var i = 0; i < fileList.length; i++){
          var objectUrl = anyWindow.createObjectURL(fileList[i]);
          $('.preview-area2').html('<span class="span2"><img class="img-thumbnail" src="' + objectUrl + '" alt="" style="width:111px;height:100px"></span>');
          window.URL.revokeObjectURL(fileList[i]);
        }
    }

</script>

<?php endif ?>
<?php if ($viewType == "editCmsUser"): extract($data) ?>
	<form method="POST" name="updateForm" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">

		           <div class="form-group row">
		            <div class="col-md-6">
		            	<input type="hidden" name="userid" value="<?=$userid?>">
		              <label class="col-form-label">Name</label>
		              <input type="text" requiredd name="name" value="<?=$name?>"  class="form-control-sm form-control">
		            </div>
		            <div class="col-md-6">
		               <label class="col-form-label">Email</label>
		              <input type="email"  name="email" value="<?=$email?>" class="form-control-sm form-control">
		            </div>
		          </div>
		          <div class="form-group row">
		            <div class="col-md-6">
		              <label class="col-form-label">Username</label>
		              <input type="username" requiredd name="username"  value="<?=$username?>" class="form-control-sm form-control">
		            </div>
		            <div class="col-md-6">
		               <label class="col-form-label">Password</label>
		              <input type="password" requiredd name="password" value="fk0001" class="form-control-sm form-control">
		            </div>
		          </div>  
		          <div class="form-group row">
		            <div class="col-md-6">
		              <label class="col-form-label">Status</label>
		              <select name="status" class="form-control form-control-sm">
		              	<option value="Active">Active</option>
		              	<option value="Disable"  <?php if($status == 'Disable') echo "selected"?> >Disable</option>
		              </select>
		            </div>
		            <div class="col-md-6">
		               <label class="col-form-label">Role</label>
		              <select name="role" class="form-control form-control-sm">
		              	<option value="Admin">Admin</option>
		              	<option value="User" <?php if($status == 'User') echo "selected"?>>User</option>
		              </select>
		            </div>
		          </div>  

		           <div class="form-group row">
		            <div class="col-md-6">
					<label class="col-form-label">Image</label>
		              <input type="file" id="image2" onchange="preview()"  name="files"  class="form-control-sm input-sm form-control">
		            </div>
		             <div class="col-md-6" >
		             	<label class="col-form-label">Duties</label>
		          		<br>
		          		<?php $duties = explode(',', $duties) ?>
		          		<div class="form-check form-check-inline">
							<label class="form-check-label">
							<input class="form-check-input" type="checkbox"   name='duties[]' value="Add" <?php if(in_array('Add', $duties)) echo 'checked' ?> > Add
							</label>
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name='duties[]' value="Edit" <?php if(in_array('Edit', $duties)) echo 'checked' ?>> Edit
							</label>
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name='duties[]' value="Del" <?php if(in_array('Del', $duties)) echo 'checked' ?>> Delete
							</label>
						</div>
		            </div>
		           </div>
		           <span class="preview-area2">
		           <?php if ($image): ?>
		           	<img src="<?=base_url().'assets/cms_images/thumbnail/'.$image?>">
		           <?php endif ?>

		           </span>
		          
		           	 
		         
		 		<div class="form-group row">
		            <div class="col-md-12">
		     
		                 <button type="submit" class="float-right btn btn-primary btn-sm ">Save Data</button>
		            </div>
		          </div>  
		        </form>
<script type="text/javascript">
var inputLocalFont2= document.getElementById("image2");
inputLocalFont2.addEventListener("change",previewImages2,false);
function previewImages2(){
    var fileList = this.files;
    var anyWindow = window.URL || window.webkitURL;
$('.preview-area2').html('');
        for(var i = 0; i < fileList.length; i++){
          var objectUrl = anyWindow.createObjectURL(fileList[i]);
          $('.preview-area2').html('<span class="span2"><img class="img-thumbnail" src="' + objectUrl + '" alt="" style="width:111px;height:100px"></span>');
          window.URL.revokeObjectURL(fileList[i]);
        }
    }

</script>
<?php endif ?>
