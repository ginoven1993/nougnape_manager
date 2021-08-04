<?php

namespace App\Models\Systems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sys_log extends Model
{
    use HasFactory;

    protected $table='sys_logs';
    protected $primaryKey='idSysLog';

       protected $guarded=['created_at, update_at, deleted_at'];

}
