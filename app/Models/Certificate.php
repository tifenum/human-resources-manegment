<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'issued_for',
        'salary',
        'department',
        'description',
        'confirmed',
        'status_MD',
        'status_HD',
        'status_FD',
        'status_Ch5',
        'certificate_name',
    ];

    protected $casts = [
        'confirmed' => 'boolean',
        'status_MD' => 'boolean',
        'status_HD' => 'boolean',
        'status_FD' => 'boolean',
        'status_Ch5' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
