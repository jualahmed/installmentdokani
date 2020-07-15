<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Distributorm extends Eloquent
{
    public $table = "distributor_info";

    protected $primaryKey = 'distributor_id'; // or null
    
}
