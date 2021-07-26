<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class PaymentModel extends Eloquent{
    protected $table = 'e_payment';
    protected $primaryKey = "id";
    protected $fillable=['dealer_id','saleman_id','amount','type','create_at'];
    public $timestamps = false;
    public function saleman()
    {
        return $this->hasOne(new CustomerModel(),'user_id','saleman_id');
    }
    public function dealer()
    {
        return $this->hasOne(new CustomerModel(),'user_id','dealer_id');
    }
    
    

}
?>