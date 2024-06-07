<?php

namespace Src\Modules\Student\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cpf',
        'birth_date',
        'email',
        'phone',
        'address',
        'cep',
        'marital_status',
        'responsibility'
    ];
}

