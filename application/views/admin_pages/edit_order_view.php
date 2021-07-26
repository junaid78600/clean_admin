<?php $this->load->view('admin_layout/header');?>
<style type="text/css">
	.quantity{
   display:flex;
   width:50px;
}

/* it will support chrome and firefox */
.quantity input[type=number]::-webkit-inner-spin-button,
.quantity input[type=number]::-webkit-outer-spin-button{
   -webkit-appearance:none;
}


.quantity input{
   border-left:none;
   border-right:none;
}

#overlay{	
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}

</style>
<!-- BEGIN .app-main -->
<input type="hidden" name="order_id" value="<?=$order->id?>" id="order_id">
				<div class="app-main">
					<!-- BEGIN .main-heading -->
					<div id="overlay">
					  <div class="cv-spinner">
					    <span class="spinner"></span>
					  </div>
					</div>
					<header class="main-heading">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
									<div class="page-icon">
										<i class="icon-laptop_windows"></i>
									</div>
									<div class="page-title">
										<h5>Shop</h5>
										<h6 class="sub-heading">Welcome to Shop Managment</h6>
									</div>
								</div>
								
							</div>
						</div>
					</header>
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<div class="row gutters">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 ">
								<div class="card bg-light">
									<div class="card-header">
										<div class="row">
											<div class="col-sm-1">
										<button  onclick="addNew()" type="button" class="btn btn-sm btn-dark float-left"><i class="icon-plus"></i> </button>
											</div>
											<div class="col-sm-11 ">
												
												<select class="form-control dealer" name="dealer">
													<option value="0" selected>Select Dealer</option>
													<?php foreach ($dealer as $key => $value): ?>
														
													<option <?=($value->user_id==$order->dealer->user_id)?'selected':''?> value="<?=$value->user_id?>"><?=$value->name?></option>
													<?php endforeach ?>
												</select>
												
											</div>
										</div>
										<div class="row">
											
											<div class="col-sm-12 ">
											<label class="col-form-label">City </label>
												<select class="form-control location" name="location">
													<option value="0" selected>Select city</option>
													<?php foreach ($location as $key => $value): ?>
														
													<option <?=($value->id==$order->location->id)?'selected':''?> value="<?=$value->id?>"><?=$value->city_name?></option>
													<?php endforeach ?>
												</select>
												
											</div>
										</div>
									</div>
									<div class="card-body">
										<table class="table table-info">
											<thead class="text-center">
												<tr>
													<th>Product</th>
													<th>Price</th>
													<th>Qty</th>
													<th>Subtotal</th>
													<th>
														<i class="icon-bin"></i>
														
													</th>
												</tr>
											</thead>
											<tbody class="item_list" style="height: 400px">
												<tr>
													<td>
														<span class="badge badge-pill badge-dark">Badge</span>
													</td>
													<td>
														1200
													</td>
													<td>
														<input class="quantity " type="number" min="1" value="1" size="2" placeholder="">
													</td>
													<td>
														<span class="float-center">1200</span>
													</td>
													<td><i class="icon-bin"></i></td>

												</tr>

											</tbody>
										</table>
										<table class="table table-responsive table-inverse">
											
											<tbody>
												<tr>
													<td>Total item</td>
													<td class="item_no">0(0)</td>
													<td width="25%">Total</td>
													<td  class="total_amount">0</td>
												</tr>
											</tbody>
										</table>
										<table class="table table-responsive table-inverse">
											
											<tbody>
												<tr>
													<td>Total Amount</td>
													<td  class="float-right total_amount">0.00</td>
												</tr>
											</tbody>
										</table>
										<div class="row form alert">
                                           
                                            <div class="col-xs-4" style="padding: 0;">
                                                <button type="button" onClick="placeOrder()" class="btn btn-success btn-block btn-flat" id="payment" style="height:67px;">Update</button>
                                            </div>
                                        </div>
									</div>
								</div>
								
							</div>
							<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 ">
								<div class="container">
									<div class="row productlist">
										
										
										
									</div>	
								</div>
								
							</div>
					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->

<?php $this->load->view('admin_layout/footer');?>
<?php $this->load->view('admin_pages/inc/dealer')?>
<script type="text/javascript">
	$("aside").addClass('is-mini');
	$("#overlay").fadeIn(300);
	
	
	$.ajax({
		url: '<?=base_url()?>AdminApi/getProduct',
		type: 'Get',
		dataType: 'json',
	})
	.done(function(data) {
		// let finalData=$.parseJSON(data);
		let html=`<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
			<div class="alert custom alert-warning">
				<i class="icon-flash"></i>Data Not Found!
			</div>
		</div>`;
		(data)?html='':html
		
		// return false;
		$.each(data, function(index, val) {
			 /* iterate through array or object */
			$("#overlay").fadeOut(300);

			 html+=`<div class="col-sm-2 bg-white m-1 addtocard product`+val['id']+`"
			  data-pstock='`+val['stock']+`'
			 	data-pid="`+val['id']+`"" data-pname="`+val['name']+`" data-pprice="`+val['price']+`"
			 	  >
					<div class="bt-white mt-3">
						<img src="<?=base_url()?>assets/cms_images/thumbnail/`+val['image']+`" class="img-fluid " alt="Responsive image">
					</div>
					<p  class="badge btn-block badge-default text-dark">`+val['name']+`</p>
				</div>`;
		});
		$(".productlist").html(html)
		AddToCard();
		
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	// ad to card
	AddToCard=()=>{
	$(".addtocard").click(async function() {
		
		 if(checkStock($(this)))
		 {
		 	
		     add_data($(this))
		 }
		// console.log($(this).data('pid'))

	});
	}
	checkStock=(Product)=>
	{
		if($(Product).data('pstock')==0)
		{
			notes.show(''+$(Product).data('pname')+' Out of Stock', {
					type: 'warning',
					title: '',
					icon: '<i class="icon-flag-outline"></i>'
				});
			return false;
		}
		else if($(Product).data('pstock')<5)
		{
				notes.show(' less then 5 item available ', {
					type: 'danger',
					title: 'Low stock Alert',
					icon: '<i class="icon-flag-outline"></i>'
				});
			return true;

		}
		return true
	}
	// add to card req
	add_data=(Product)=>
	{	
		var id=$(Product).data('pid')
		$.post('<?=base_url()?>Cart/add_to_cart', {id}, function(data, textStatus, xhr) {
			/*optional stuff to do after success */
			var d=$.parseJSON(data);
			if(d.status==1)
			{	
				print_view(d.data,d.total)
				notes.show(''+$(Product).data('pname')+' Added To Success', {
					type: 'success',
					title: '',
					icon: '<i class="icon-flag-outline"></i>'
				});
				return true;
			}else
			{
				notes.show('Action Fail ', {
					type: 'warning',
					title: '',
					icon: '<i class="icon-flag-outline"></i>'
				});
				return false
			}
		});
	}
	// print_view
	get_cart=()=>
	{
		$.post('<?=base_url()?>Cart/view_cart',function(data, textStatus, xhr) {
			/*optional stuff to do after success */
			var d=$.parseJSON(data);

			print_view(d.data,d.total)
		});
	}
	print_view=(data,total)=>
	{	
		let view='';
		let item=0;
		$.each(data, function(index, val) {item++;
		console.log(val)
			 /* iterate through array or object */
			 view+=`<tr>
						<td>
							<span class="badge badge-pill badge-dark">`+val['name']+`</span>
						</td>
						<td>
							`+val['price']+`
						</td>
						<td>
							<input class="quantity" data-cid="`+val['rowid']+`" type="number" min="1" value="`+val['qty']+`" size="2" placeholder="">
						</td>
						<td>
							<span class="float-center">
							`+val['price']*val['qty']+`

							</span>
						</td>
						<td><i  data-pid="`+val['id']+`" data-cid="`+val['rowid']+`" class="icon-bin remove"></i></td>

					</tr>`;
		});
		$(".item_list").html(view)
		$(".total_amount").html(total)
		$(".item_no").html(item)
		$(".remove").click(function() {
		/* Act on the event */
		remove(this);
	    });
	    $(".quantity").change(function(event) {
	    	/* Act on the event */
	    	quantity(this);
	    });
	    // $(".quantity").keyup(function(event) {
	    // 	 Act on the event 
	    // 	quantity(this);
	    // });
	}
	// remove

	remove=(r)=>
	{
		var row_id=$(r).data('cid');
		var id=$(r).data('pid');

		// return false;
		$.post('<?=base_url()?>Cart/remove', {row_id}, function(data, textStatus, xhr) {
			/*optional stuff to do after success */
			get_cart();
			messages.show("Item Remove Success", {
			type: 'danger',
			title: 'Item Remove',
			icon: '<i class="icon-info-outline"></i>'
		});
		});
	}
	quantity=(Product)=>
	{	
		var id=$(Product).data('cid');
		var qty=$(Product).val();
		if(qty=='')
		{
			return false;
		}

		$.post('<?=base_url()?>Cart/update_cart', {id,qty}, function(data, textStatus, xhr) {
			/*optional stuff to do after success */
	     get_cart()

		});
	}
	// print cart
	get_cart()
	placeOrder=()=>
	{		
		let dealer=$(".dealer").val();
		let location=$('.location').val();
		let order_id=$('#order_id').val()
		if(dealer==0){ 
				notes.show("Action Fail", {
					type: 'danger',
					title: 'Please Select Dealer ',
					icon: '<i class="icon-info-outline"></i>'
				});
				return false;}
		if(order_id==''){ 
				notes.show("Action Fail", {
					type: 'danger',
					title: 'Some technical issue  ',
					icon: '<i class="icon-info-outline"></i>'
				});
				return false;}
		if(location==0){ 
		notes.show("Action Fail", {
			type: 'danger',
			title: 'Please Select City name ',
			icon: '<i class="icon-info-outline"></i>'
		});

			return false;}
		$.post("<?=base_url()?>cart/update_order",{dealer,location,order_id},
			function (data, textStatus, jqXHR) {
				let d=$.parseJSON(data);
				if(d.status==1)
				{
					
					notes.show('Action Success ', {
					type: 'success',
					title: 'Order Succesfully Done',
					icon: '<i class="icon-flag-outline"></i>'
					});
					// get_cart();
					document.location='<?=$send?>'
				}else{
					messages.show("Action Fail", {
					type: 'danger',
					title: 'Server Issue',
					icon: '<i class="icon-info-outline"></i>'
				});
				}
				
			}
		);
	}
	
</script>
