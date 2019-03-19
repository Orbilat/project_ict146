<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    //
    protected $table = 'stations';
    protected $primaryKey = 'stationId';

    protected $fillable = [
        'stationName', 'timeReceived', 'timeCompleted', 'managedBy', 'managedDate',
    ];
}
