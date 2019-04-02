<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'items';
    protected $primaryKey = 'itemId';

    protected $fillable = [
        'itemName', 'containerType', 'quantity', 'supplier'
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier', 'supplierId');
    }
}
