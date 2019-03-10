<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    //
    protected $table = 'samples';
    protected $primaryKey = 'sampleId';

    protected $fillable = [
        'clientsCode', 'sampleMatrix', 'collectionTime', 'samplePreservation', 'purposeOfAnalysis', 'sampleSource', 'dueDate', 'managedBy', 'managedDate',
    ];
    protected $hidden = [
        'risNumber',
    ];
}
