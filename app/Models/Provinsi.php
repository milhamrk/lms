<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    public $timestamps = false;
	protected $table = 'tbl_provinsi';

    protected $guarded = ['id'];
}
