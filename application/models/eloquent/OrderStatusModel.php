<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class OrderStatusModel extends Eloquent{
    protected $table = 'e_order_status';
    protected $primaryKey = "id";
    protected $fillable=['order_id','stage','created_at','user_id','change_by','type','status'];
    public $timestamps = false;
    public function order()
    {
        return $this->hasOne(new OrderModel(),'id','order_id');
    }
    public function statusList()
    {
        return $this->hasMany(new OrderStatusModel(),'order_id','order_id');
    }
    
    

}
?>