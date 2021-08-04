<?php

namespace App\Models\Systems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sys_right_default extends Model
{
    use HasFactory;
    protected $table='sys_right_defaults';
    protected $primaryKey='idRightDefault';

    protected $guarded = ['created_at', 'updated_at'];

}
