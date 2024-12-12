<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogUser extends Model
{
    protected $fillable = [
        'template',
        'ip',
        'type',
        'os',
        'useragent',
        'browser',
        'created_at',
    ];
}
