<?php $this->load->view('admin_layout/header');?>
<?php extract($settings) ?>
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
										<h5>Settings</h5>
										<h6 class="sub-heading">Welcome to Settings Managment</h6>
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
									<div class="card-header">Settings </div>
									<div class="card-body">
										<?php echo show_flash_data();?>
										<span id="flash_data"></span>
										<form method="POST" name="updateForm" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
		           <div class="form-group row">
		            <div class="col-md-6">

		              <label class="col-form-label">Site Name</label>
		              <input type="hidden" value="<?=$id?>" name="id">
		              <input type="text"  name="siteName" value="<?=$siteName?>"  class="form-control-sm form-control">
		            </div>
		
		            <div class="col-md-6">
		               <label class="col-form-label">Email </label>
		              <input type="email" value="<?=$email?>" name="email"  class="form-control-sm form-control">
		            </div>
		          </div> 
		           <div class="form-group row">
		            <div class="col-md-6">

		              <label class="col-form-label">About Us</label>
		               <textarea class="form-control" rows="10" name="about" ><?=$about?></textarea>
		            </div>

		            <div class="col-md-6">
		               <label class="col-form-label">Tearm & Condition </label>
		                <textarea class="form-control" rows="10" name="term_and_condition" ><?=$term_and_condition?></textarea>
		            </div>
		          </div>  
		          <div class="col-md-4">
		               <label class="col-form-label">Ticket stock </label>
		              <input type="number" min="1" value="<?=$stock?>" name="stock"  class="form-control-sm form-control">
		            </div>
		         
		           

		         
		           <div class="form-group row">
		            <div class="col-md-4">
					<label class="col-form-label">Logo</label>
		              <input type="file" id="image"  name="files"  class="form-control-sm input-sm form-control">
		           	 <span class="preview-area">
		           	 	<?php if (!empty($image)): ?>
		           	 		<img src="<?=base_url()?>assets/cms_images/<?=$image?>" width=100>
		           	 	<?php endif ?>
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
				<!-- END: .app-main -->
<script type="text/javascript">
function update(id)
{
	var viewType = 'editMenu';
	$("#extraModel").modal();
	$("#extraTitle").html("Edit Menu");
	$("#extraBoday").html("<h2 class='text-center'><span class='icon-spinner3'></span></h2>");
	$.post("<?php echo base_url(); ?>Function_control/getView",{viewType,id}, 
		function(data)
		{
			$("#extraBoday").html(data); 	
			//$('#myModal').modal('hide');
		});

}
function deleteRecord(key,value,tableName)
{
	var file = 'image';
	var file_path = 'assets/cms_images/';
	if (confirm("Are you sure to delete?"))
	{  
		$.post("<?php echo base_url(); ?>Function_control/deleteRecord",{key,value,tableName,file,file_path}, 
			function(data)
			{
				//alert(data);
				$("#row"+value).hide();
				$("#flash_data").html(data);
			});
	}
}
function addNew()
{
	$("#addModal").modal();
}

function form_validation() 
{  
   // var value = CKEDITOR.instances['editor1'].getData();
   // $("#editorReplace").val(value);
    var form = new FormData($('#myForm')[0]);
    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>Function_control/saveMenu',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res)
      {
      	//alert(res);
       window.setTimeout(window.location='<?php echo base_url(); ?>Admin/menu',1000);
      }
       
    });
      return false;
}  

function update_validation() 
{   
   // var value = CKEDITOR.instances['editor1'].getData();
   // $("#editorReplace").val(value);
    var form = new FormData($('#updateForm')[0]);
    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>Function_control/updateSetting',
      data: form,
      cache: false,
      contentType: false,
      processData: false,
      success: function(res)
      {
      	//alert(res);
      	
       window.setTimeout(window.location='<?php echo base_url(); ?>Admin/settings',1000);
      }
       
    });
      return false;
}   
</script>

<!-- modals area -->
<div class="modal fade " id="extraModel" tabindex="-1" role="dialog" aria-labelledby="extraModel12" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content brad0">
			<div class="modal-header brad0">
				<h5 class="modal-title" id="extraTitle">Add New</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body" id="extraBoday">
			</div>					
		</div>
	</div>
</div>


<script type="text/javascript" src="<?=base_url();?>assets/cms_layout/vendor/editor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/cms_layout/vendor/editor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'editor1', {

  language: 'en'
    
});
//CKFinder.setupCKEditor( editor, '../' );



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
<script type="text/javascript">
  var inputLocalFont = document.getElementById("image2");
inputLocalFont.addEventListener("change",previewImages2,false);
function previewImages2(){
    var fileList = this.files;
    var anyWindow = window.URL || window.webkitURL;
$('.preview-area2').html('');
        for(var i = 0; i < fileList.length; i++){
          var objectUrl = anyWindow.createObjectURL(fileList[i]);
          $('.preview-area2').append('<span class="span2"><img class="img-thumbnail" src="' + objectUrl + '" alt="" style="width:111px;height:100px"></span>');
          window.URL.revokeObjectURL(fileList[i]);
        }
    }

</script>

<?php $this->load->view('admin_layout/footer');?>
