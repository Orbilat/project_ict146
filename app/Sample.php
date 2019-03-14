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
}
