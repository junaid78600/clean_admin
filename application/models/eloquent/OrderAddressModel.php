<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class OrderAddressModel extends Eloquent{
    protected $table = 'e_orderaddress';
    protected $primaryKey = "id";
    protected $fillable=['user_id','order_id','driver_name','vehical_no','create_at','shipping_address','transporter_name','transporter_contact'];
    public $timestamps = false;
    
    
    
    

}
?>