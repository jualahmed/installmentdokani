<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Customerm extends Eloquent
{
    public $table = "customer_info";

    protected $primaryKey = 'customer_id'; // or null

}
