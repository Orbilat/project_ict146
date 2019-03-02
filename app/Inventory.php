<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';
	protected $primaryKey = 'inventoryId';
	public $timestamps = false;
	
	protected $fillable = [
        'empId', 'dateofuse'
    ];
}
