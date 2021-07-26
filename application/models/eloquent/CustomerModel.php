<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class CustomerModel extends Eloquent{
    protected $table = 'e_users';
    protected $primaryKey = "user_id";
    protected $fillable=['name','email','phone','password','city','address','status','role'];
    public $timestamps = false;
    public function payment()
    {
        return $this->hasMany(new PaymentModel(),'dealer_id','user_id')->with('saleman');
    }
    public function orders()
    {
        return $this->hasMany(new OrderModel(),'order_by','user_id');
    }
    
    
    

}
?>