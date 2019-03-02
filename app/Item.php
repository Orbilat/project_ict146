<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
	protected $primaryKey = 'itemId';
	public $timestamps = false;
	
	protected $fillable = [
        'itemType', 'containerType', 'quantity', 'expiryDate'
    ];

}
