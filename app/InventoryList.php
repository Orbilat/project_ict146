<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryList extends Model
{
    protected $table = 'inventory_list';
	protected $primaryKey = 'listid';

	protected $fillable = [
        'inventoryId', 'itemId', 'qty'
    ];
}
