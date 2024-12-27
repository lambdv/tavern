<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'trending', 'user_id', 'tavern_id'];
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function tavern(){
        return $this->belongsTo(Tavern::class);
    }

    //$post->tavern()->name
}

