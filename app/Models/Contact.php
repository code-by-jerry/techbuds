<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'project_type',
        'message',
        'nda_requested',
        'status',
        'notes',
    ];

    protected $casts = [
        'nda_requested' => 'boolean',
    ];
}
