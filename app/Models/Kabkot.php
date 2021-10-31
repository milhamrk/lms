<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabkot extends Model
{
    public $timestamps = false;
	protected $table = 'tbl_kabkot';

    protected $guarded = ['id'];
}
