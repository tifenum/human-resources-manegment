<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'amount',
        'date_wish',
        'department',
        'description',
        'chief_staff_status',
        'head_department_status',
        'financial_director_status',
        'manager_director_status',
        'accepte',
    ];

    protected $casts = [
        'amount' => 'float',
        'chief_staff_status' => 'boolean',
        'head_department_status' => 'boolean',
        'financial_director_status' => 'boolean',
        'manager_director_status' => 'boolean',
    ];
    // In Advance.php (Advance model)
public function user()
{
    return $this->belongsTo(User::class);
}

}
