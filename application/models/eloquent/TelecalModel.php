<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class TelecalModel extends Eloquent{
    protected $table = 'e_telecall';
    protected $primaryKey = "id";
    protected $fillable=['order_id','added_by','name','contact_no','created_at'];
    public $timestamps = false;
    
    
    

}
?>