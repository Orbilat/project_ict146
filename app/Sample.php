<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
	protected $table = 'sample';
	protected $primaryKey = 'sampleId';
	protected $casts = ['sampleId' => 'bigint'];
}
