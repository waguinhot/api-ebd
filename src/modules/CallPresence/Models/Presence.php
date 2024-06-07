<?php

namespace Src\Modules\CallPresence\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'classroom_id',
        'date',
        'presence',
        'created_at',
        'updated_at',
    ];
}


