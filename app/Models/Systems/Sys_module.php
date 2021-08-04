<?php

namespace App\Models\Systems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sys_module extends Model
{
    use HasFactory;
    
    protected $table='sys_modules';
    protected $primaryKey='idSysModule';

    protected $guarded= ['created_at','updated_at'];
    public $timestamps = false;
    
    

}
