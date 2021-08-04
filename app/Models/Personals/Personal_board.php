<?php

namespace App\Models\Personals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_board extends Model
{
    use HasFactory;

    protected $table='personal_boards';
    protected $primarykey='idPersonalBoard';

    protected $guarded=['created_at, updated_at, deleted_at'];
    protected $hidden = ['personalPassword'];
}
