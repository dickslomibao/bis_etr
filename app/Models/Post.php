<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Post extends Model
{
    use HasUuids;
    use HasFactory;
    
    protected $fillable = [
        'title',
        'type',
        'thumbnail',
        'content',
        'status',
        'date_posted',
    ];
}
