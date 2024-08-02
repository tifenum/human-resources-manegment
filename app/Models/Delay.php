<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delay extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reason',
        'exit_time',
        'return_time',
        'day',
        'amount_of_time',
        'status_MD',
        'status_HD',
        'status_FD',
        'status_Ch5',
        'confirmed',
    ];
}
