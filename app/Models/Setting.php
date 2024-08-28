<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Define the table associated with the model
    protected $table = 'settings';

    // Specify which attributes can be mass assigned
    protected $fillable = ['key', 'value'];
}
