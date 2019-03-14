<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    //
    protected $table = 'parameters';
    protected $primaryKey = 'parameterId';

    protected $fillable = [
        'analysis', 'method', 'stationId', 'managedBy', 'managedDate',
    ];
}
