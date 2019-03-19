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
}
