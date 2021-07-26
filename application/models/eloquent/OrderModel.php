<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class OrderModel extends Eloquent{
    protected $table = 'e_orders';
    protected $primaryKey = "id";
    protected $fillable=['user_id','order_no','total_order_price','status','order_by','type','stage','location_id'];
    public $timestamps = false;
    public function oderDetails()
    {
        return $this->hasMany(new ItemModel(),'order_id','id')->with('item');
    }
    public function dealer()
    {
        return $this->hasOne(new CustomerModel(),'user_id','order_by');
    }
    public function shipping()
    {
        return $this->hasOne(new OrderAddressModel(),'order_id','id');
    }
    public function location()
    {
        return $this->hasOne(new City_Model(),'id','location_id');
    }
    public function statusList()
    {
        return $this->hasMany(new OrderStatusModel(),'order_id','id');
    }
    public function telecal()
    {
        return $this->hasOne(new TelecalModel(),'order_id','id');
    }

    
    
    

}
?>