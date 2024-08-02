<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExitDemand extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'exit_demands';

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'reason',
        'exit_day',
        'department',
        'status_MD',
        'status_HD',
        'status_FD',
        'status_Ch5',
        'confirmed',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'status_MD' => 'boolean',
        'status_HD' => 'boolean',
        'status_FD' => 'boolean',
        'status_Ch5' => 'boolean',
        'confirmed' => 'boolean',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
