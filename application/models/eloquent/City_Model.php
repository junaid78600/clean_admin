<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class City_Model extends Eloquent{
    protected $table = 'e_city';
    protected $fillable=['id','city_name','created_at'];

    protected $primaryKey = "id";
    public $timestamps = false;
    
    

}
?>