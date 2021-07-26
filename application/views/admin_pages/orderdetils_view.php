<?php $this->load->view('admin_layout/header');?>
<style>

#order-heading {
    background-color: #edf4f7;
    position: relative;
    border-top-left-radius: 25px;
    max-width: 800px;
    padding-top: 20px;
    margin: 30px auto 0px
}

#order-heading .text-uppercase {
    font-size: 0.9rem;
    color: #777;
    font-weight: 600
}

#order-heading .h4 {
    font-weight: 600
}

#order-heading .h4+div p {
    font-size: 0.8rem;
    color: #777
}

.close {
    padding: 10px 15px;
    background-color: #777;
    border-radius: 50%;
    position: absolute;
    right: -15px;
    top: -20px
}

.wrapper {
    padding: 0px 50px 50px;
    max-width: 800px;
    margin: 0px auto 40px;
    border-bottom-left-radius: 25px;
    border-bottom-right-radius: 25px
}

.table th {
    border-top: none
}

.table thead tr.text-uppercase th {
    font-size: 0.8rem;
    padding-left: 0px;
    padding-right: 0px
}

.table tbody tr th,
.table tbody tr td {
    font-size: 0.9rem;
    padding-left: 0px;
    padding-right: 0px;
    padding-bottom: 5px
}

.table-responsive {
    height: 100px
}

.list div b {
    font-size: 0.8rem
}

.list .order-item {
    font-weight: 600;
    color: #6db3ec
}

.list:hover {
    background-color: #f4f4f4;
    cursor: pointer;
    border-radius: 5px
}

label {
    margin-bottom: 0;
    padding: 0;
    font-weight: 900
}

button.btn {
    font-size: 0.9rem;
    background-color: #66cdaa
}

button.btn:hover {
    background-color: #5cb99a
}

.price {
    color: #5cb99a;
    font-weight: 700
}

p.text-justify {
    font-size: 0.9rem;
    margin: 0
}

.row {
    margin: 0px
}

.subscriptions {
    border: 1px solid #ddd;
    border-left: 5px solid #ffa500;
    padding: 10px
}

.subscriptions div {
    font-size: 0.9rem
}

@media(max-width: 425px) {
    .wrapper {
        padding: 20px
    }

    body {
        font-size: 0.85rem
    }

    .subscriptions div {
        padding-left: 5px
    }

    img+label {
        font-size: 0.75rem
    }
}
</style>
<div class="app-main">
					
					<!-- END: .main-heading -->
					<!-- BEGIN .main-content -->
					<div class="main-content">
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									
									<div class="card-body">
                                    <div class="d-flex  flex-column justify-content-center align-items-center" id="order-heading">
    <div class="text-uppercase">
        <p>Order detail</p>
    </div>
    <div class="h4"><?php 
     $date = new DateTime($order->created_at);
     echo $date->format('l, F jS, Y');
    ?>
    </div>
    <div class="pt-1">
        <p>Order #<?=$order->order_no?> is currently<b class="text-dark"> <?=$order->status?></b></p>
    </div>
   
   
</div>
<div class="wrapper bg-white">
    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr class="text-uppercase text-muted">
                    <th scope="col">product</th>
                    <th scope="col" class="text-right">total  
                       
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td class="text-right"><b><?= number_format($order->total_order_price)?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php 
    foreach($order->oderDetails as $value):
    ?>
    <div class="d-flex justify-content-start align-items-center list py-1 row">
        <div class="col-sm-2"><b><?=$value->qty?>px</b></div>
        <div class="mx-3 col-sm-3"> <img src="<?=base_url()?>assets/cms_images/thumbnail/<?=$value->item->image?>" alt="apple" class="rounded-box" > </div>
        <div class="mx-2 order-item col-sm-4"><?=$value->product_name?></div>
        <div class=" order-item col-sm-2"><?=number_format($value->qty*$value->price)?></div>
    </div>
    <?php endforeach;?>
    

   
    
    <div class="d-flex justify-content-start align-items-center pl-3 py-3 mb-4 border-bottom">
        <div class="text-muted"> Today's Total </div>

        <div class="ml-auto h5"> <?=number_format($order->total_order_price) ?> </div>
    </div>
    <!-- edit order icon -->
    <?php if ($order->stage==3||$order->stage==6): ?>
    <div class="pt-1">
         <a href="<?=base_url()?>Admin/edit_order/<?=$order->id?>" class="btn btn-outline-success btn-sm float-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Order">
        <i class="icon-edit"></i>
         </a>
    </div>
    <?php endif;?> 
    <div class="pl-3 font-weight-bold">Dealer Details</div>
    <div class="row border rounded p-1 my-3 bg-light text-info">
        <div class="col-md-4 py-3">
            <div class="d-flex flex-column align-items start"> <b>Name</b>
                <p class="text-justify "><?=$order->dealer->name?></p>
                
            </div>
        </div>
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Email</b>
                <p class="text-justify "><?=$order->dealer->email?></p>
                
            </div>
        </div>
        <div class="col-md-4 py-3">
            <div class="d-flex flex-column align-items start"> <b>Phone</b>
                <p class="text-justify "><?=$order->dealer->phone?></p>
                
            </div>
        </div>
        <div class="col-md-4 py-3">
            <div class="d-flex flex-column align-items start"> <b>City</b>
                <p class="text-justify "><?=$order->dealer->city?></p>
                
            </div>
        </div>
        <div class="col-md-4 py-3">
            <div class="d-flex flex-column align-items start"> <b>Location </b>
                <p class="text-justify "><?=$order->dealer->address?></p>
                
            </div>
        </div>
        <?php if ($order->telecal): ?>
        <div class="col-sm-12 pl-3 font-weight-bold mb-4">Telecalling Details </div>
        
         <div class="col-md-4">
            <div class="d-flex flex-column align-items start"> <b>Name </b>
                <p class="text-justify "><?=$order->telecal->name?></p>
                
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="d-flex flex-column align-items start"> <b>Contact No </b>
                <p class="text-justify "><?=$order->telecal->contact_no?></p>
                
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="d-flex flex-column align-items start"> <b>Date & Time  </b>
                <p class="text-justify "><?=$order->telecal->created_at?></p>
                
            </div>
        </div> 

     
            
        <?php endif ?>
    </div>

    <!-- shipping info -->
    <?php if ($order->shipping): ?>
        
   
    <div class="pl-3 font-weight-bold">Driver  Details</div>
    <div class="row border rounded p-1 my-3 bg-light text-info">
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Driver Name</b>
                <p class="text-justify "><?=$order->shipping->driver_name?></p>
                
            </div>
        </div>
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Vehical Name</b>
                <p class="text-justify "><?=$order->shipping->vehical_no?></p>
                
            </div>
        </div>
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Shipping Address</b>
                <p class="text-justify "><?=$order->shipping->shipping_address?></p>
                
            </div>
        </div>
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Dispatch Date</b>
                <p class="text-justify "><?=$order->shipping->create_at?></p>
                
            </div>
        </div>
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Transporter Name</b>
                <p class="text-justify "><?=$order->shipping->transporter_name?></p>
                
            </div>
        </div>
        <div class="col-md-6 py-3">
            <div class="d-flex flex-column align-items start"> <b>Transporter Contact No</b>
                <p class="text-justify "><?=$order->shipping->transporter_contact?></p>
                
            </div>
        </div>
        
    </div>

 <?php endif ?>

    <div class="pl-3 font-weight-bold">Order Stage</div>
    
    <div class="show_status"></div>


    <?php if ($order->stage==3||$order->stage==6): ?>
    
    <div class="row">
        <div class="col-sm-12 ">
            <div class="btn-group btn-group-lg float-right status_button" role="group" aria-label="Basic example">
                <button type="button" onclick="change_status('<?=$order->id?>',1)" class="btn btn-secondary">Accept</button>
                <button type="button" onclick="change_status('<?=$order->id?>',0)" class="btn btn-secondary">Reject</button>
            </div>
        </div>
    </div>
<?php endif ?>
</div>
									</div>
								</div>
							</div>
					</div>
					<!-- END: .main-content -->
				</div>
				<!-- END: .app-main -->
<?php $this->load->view('admin_layout/footer');?>

<script>
$(function(){
	$('#orderList').DataTable({
		'iDisplayLength': 50,
        'order':[0,'desc']
	});
});

change_status=(order_id,type)=>
{   
    if (confirm("Are you sure to Update status?"))
    {
    $.post('<?=base_url()?>AdminAPi/changeorderStatus', {order_id,type}, function(data, textStatus, xhr) {
        /*optional stuff to do after success */
        $(".status_button").hide();
        showStatus()
        notes.show("Action success", {
                    type: 'success',
                    title: 'Status Update successfully ',
                    icon: '<i class="icon-info-outline"></i>'
                });
    });
    }
}
showStatus=()=>
{   
    let order_id='<?=$order->id?>';
    $.post('<?=base_url()?>AjaxRequest/getOrderStatus', {order_id}, function(data, textStatus, xhr) {
        /*optional stuff to do after success */
        let d=$.parseJSON(data);
        let html='';
        var count=0;
        $.each(d, function(index, val) {
             /* iterate through array or object */
        html+=`<div class="d-sm-flex justify-content-between rounded my-3 subscriptions">
        <div> <b>#`+count+++`</b> </div>
        <div>`+val.created_at+`</div>
        <div>Status: `+val.status+`</div>
        <div> Change By: <b>`+val.change_by+`</b> </div>
    </div>`;
        });
        $(".show_status").html(html)
    });
}
showStatus();
</script>
