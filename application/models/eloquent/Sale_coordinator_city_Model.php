<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class Sale_coordinator_city_Model extends Eloquent{
    protected $table = 'sale_coordinator_city';
    protected $fillable=['id','user_id','city_id','created_at'];

    protected $primaryKey = "id";
    public $timestamps = false;
    
    

}
?>