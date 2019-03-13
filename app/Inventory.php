<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = 'inventories';
    protected $primaryKey = 'inventoryId';

    protected $fillable = [
        'usedBy', 'dateOfUse'
    ];
}
