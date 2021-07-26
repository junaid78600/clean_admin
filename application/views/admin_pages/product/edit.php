<?php $this->load->view('admin_layout/header');?>
<?php


$heading = "Edit Product";

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
                                    <a href="<?=base_url()?>Admin/product" class='btn btn-primary btn-sm float-right'>Back</a>
                                     </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<div class="" id="flash_data"></div>
                                        
                                        <?= validation_errors(); ?>
				<form method="POST" name="myForm" id="myForm"  enctype="multipart/form-data" onsubmit="return form_validation()">
					<input type="hidden" name="id" value="<?=$product->id?>">
		           <div class="form-group row">
		          
		            <div class="col-md-3">
		              <label class="col-form-label">Product Name</label>
		              <input type="text"  name="name" value="<?=$product->name?>"  required  class="form-control-sm form-control">
		            </div>
		            <div class="col-md-3">
		              <label class="col-form-label">Stock</label>
		              <input type="text"  name="stock" value="<?=$product->stock?>"  required class="form-control-sm form-control">
		            </div>
					<div class="col-md-3">
		              <label class="col-form-label">Status</label>
		              <select class="form-control-sm form-control" name="status" >
		              	
		              	<option <?=($product->status=='Active')?'selected':''?>  value="Active">Active </option>
		              	<option <?=($product->status=='In-Active')?'selected':''?>   value="In-Active"> In Active  </option>
		              			              	
		              </select>
		            </div>
		            <div class="col-md-3">
		              <label class="col-form-label">Amount</label>
		              <input type="number"  name="price" value="<?=$product->price?>"  required class="form-control-sm form-control">
		            </div>
		            
		          </div>
		          <div class="form-group row">
		            
		            <div class="col-md-6">
		               <label class="col-form-label">Details</label>
						<textarea class="form-control" name="details" id="" rows="3">
							<?=$product->details?>
						</textarea>
		              
		            </div>
		            
		            <div class="col-md-3">
		               <label class="col-form-label">Image</label>
		              <input type="file" id="image"  name="files"   class="form-control-sm form-control">
		            </div>
		            <div class="col-md-3">
					<span class="preview-area">
						<img class="img-thumbnail" width="100px" src="<?=base_url().'assets/cms_images/thumbnail/'.$product->image?>">
					</span>
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
      url: '<?php echo base_url(); ?>AjaxRequest/updateProduct',
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
            // window.location.href='<?=base_url()?>Admin/product';
			// $("#myForm").trigger("reset");
			notes.show("Product Added Successfully!", {
			type: 'success',
			title: 'Addes',
			icon: '<i class="icon-tick-outline"></i>'
			});
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
<script type="text/javascript">
  var inputLocalFont = document.getElementById("image");
inputLocalFont.addEventListener("change",previewImages,false);
function previewImages(){
    var fileList = this.files;
    var anyWindow = window.URL || window.webkitURL;
$('.preview-area').html('');
        for(var i = 0; i < fileList.length; i++){
          var objectUrl = anyWindow.createObjectURL(fileList[i]);
          $('.preview-area').append('<span class="span2"><img class="img-thumbnail" src="' + objectUrl + '" alt="" style="width:111px;height:100px"></span>');
          window.URL.revokeObjectURL(fileList[i]);
        }
    }

</script>
<?php $this->load->view('admin_layout/footer');?>

