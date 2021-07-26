<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class ProductModel extends Eloquent{
    protected $table = 'e_product';
    protected $primaryKey = "id";
    protected $fillable=['name','slug','user_id','image','status','details','cat_id','stock','price'];
    public $timestamps = false;
    
    
    

}
?>