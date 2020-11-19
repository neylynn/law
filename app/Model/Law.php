<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    protected $fillable = [
        'title', 'description', 'status',
    ];
}
