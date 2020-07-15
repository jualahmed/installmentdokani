<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
class Cashbookm extends Eloquent
{
    public $table = "cash_book";
    protected $primaryKey = 'cb_id';

    const CREATED_AT = 'doc';
	const UPDATED_AT = 'dom';
    
}
?>