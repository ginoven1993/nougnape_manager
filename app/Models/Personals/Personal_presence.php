<?php

namespace App\Models\Personals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_presence extends Model
{
    use HasFactory;
    protected $table='Personal_presences';
    protected $primaryKey='idSysLog';
    protected $guarded=['created_at, update_at, deleted_at'];
}
