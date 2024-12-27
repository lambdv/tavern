<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tavern extends Model
{
    /** @use HasFactory<\Database\Factories\TavernFactory> */
    protected $fillable = ['name', 'description'];
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
