<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
class Admin_Model extends Eloquent{
    protected $table = 'e_admin';
    protected $primaryKey = "id";
    public $timestamps = false;
    
    

}
?>