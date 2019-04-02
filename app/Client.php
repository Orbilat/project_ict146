<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Notifiable;

    protected $table = 'clients';
    protected $primaryKey = 'clientId';

    protected $fillable = [
        'nameOfPerson', 'nameOfEntity', 'address', 'contactNumber', 'faxNumber', 'emailAddress', 'discount', 'deposit', 
        'reclaimSample', 'testResult', 'remarks', 'dateSubmitted', 'managedBy', 'managedDate',
    ];

    public function samples()
    {
        return $this->hasMany(Sample::class, 'risNumber', 'clientId');
<<<<<<< HEAD
    }

    public function parameters()
    {
        return $this->hasManyThrough(Parameter::class, Sample::with('parameters'), '', '');
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->contactNumber;
=======
>>>>>>> 93c8009382dd7aff74466657f358791dfc6ef3ac
    }
}
