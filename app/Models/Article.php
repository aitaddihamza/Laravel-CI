<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Article extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'title',
        'content'
    ];

    public static function isEvent(int $num)
    {
        return $num % 2 === 0;
    }
}
