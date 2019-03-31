<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';
    protected $primaryKey = 'clientId';

    protected $fillable = [
        'nameOfPerson', 'nameOfEntity', 'address', 'contactNumber', 'faxNumber', 'emailAddress', 'discount', 'deposit', 
        'reclaimSample', 'testResult', 'remarks', 'dateSubmitted', 'managedBy', 'managedDate',
    ];

    public function samples()
    {
        return $this->hasMany(Sample::class, 'risNumber', 'clientId');
    }

    public function parameters()
    {
        return $this->hasManyThrough(Parameter::class, Sample::with('parameters'), '', '')
    }
}
