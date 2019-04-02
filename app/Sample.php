<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    //
    protected $table = 'samples';
    protected $primaryKey = 'sampleId';

    protected $fillable = [
        'laboratoryCode', 'clientsCode', 'sampleType', 'sampleCollection', 'samplePreservation', 'purposeOfAnalysis', 'sampleSource', 
        'dueDate', 'managedBy', 'managedDate',
    ];
    protected $hidden = [
        'risNumber',
    ];

    public function client()
    {
<<<<<<< HEAD
        return $this->belongsTo(Client::class, 'risNumber', 'clientId');
    }

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class, 'sample__tests', 'sampleCode', 'parameters')->withPivot('status', 'timecompleted');
=======
        return $this->belongsTo(Client::class, 'risNumber', 'sampleId');
>>>>>>> 93c8009382dd7aff74466657f358791dfc6ef3ac
    }
}
