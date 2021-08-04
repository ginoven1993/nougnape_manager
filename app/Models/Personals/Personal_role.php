<?php

namespace App\Models\Personals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_role extends Model
{
    use HasFactory;
    protected $table='personal_roles';
    protected $primaryKey='idPersonalRole';

       protected $guarded=['created_at, update_at, deleted_at'];
}
