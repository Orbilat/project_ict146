<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'items';
    protected $primaryKey = 'itemId';

    protected $fillable = [
        'itemType', 'containerType', 'quantity', 'expiryDate'
    ];
}
