<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class ShippedorderModel extends Eloquent{
    protected $table = 'e_shipping_order';
    protected $primaryKey = "id";
    protected $fillable=['order_id','added_by','created_at'];
    public $timestamps = false;
    
    
    

}
?>