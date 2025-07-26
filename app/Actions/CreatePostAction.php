<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Exception;

class CreatePostAction
{
    public function execute(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            return Post::create($data);
        });
    }
} 