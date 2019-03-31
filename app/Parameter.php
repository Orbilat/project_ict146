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

    public function samples()
    {
        return $this->belongsToMany(Sample::class, 'sample__tests', 'parameters', 'sampleCode')->withPivot('status', 'timecompleted');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station', 'stationId');
    }
}
