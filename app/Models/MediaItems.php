<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaItems extends Model
{
    public $fillable = ['title', 'description', 'media'];
//    use HasFactory;
}
