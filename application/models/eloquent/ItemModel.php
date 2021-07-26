<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class ItemModel extends Eloquent{
    protected $table = 'e_order_item';
    protected $primaryKey = "id";
    protected $fillable=['order_id','item_id','product_name','qty','price'];
    public $timestamps = false;
    public function item()
    {
        return $this->hasOne(new ProductModel(),'id','item_id');
    }
    
    

}
?>