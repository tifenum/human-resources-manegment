<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'user_id',
        'from_date',
        'to_date',
        'number_of_days',
        'status_MD',
        'status_HD',
        'status_FD',
        'status_Ch5',
        'reason',
        'confirmed'
    ];

    // Define any necessary relationships, e.g., with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
