<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class categories extends Model
{
    use HasFactory;
    protected $fillable = ["name", "image", "category"];
    function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
