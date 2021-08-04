<?php

namespace App\Models\Systems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sys_permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='sys_permissions';
    protected $primaryKey='idSysPermission';
    protected $guarded=['created_by, created_at, updated_at, deleted_at'];
    //protected $timestamps

}
