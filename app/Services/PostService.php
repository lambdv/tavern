<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Exception;

class PostService
{
    public function getAllPosts(): Collection
    {
        return Post::all();
    }
    
    public function createPost(array $data): Post
    {
        return DB::transaction(function () use ($data) {
            return Post::create($data);
        });
    }
    
    public function updatePost(Post $post, array $data): Post
    {
        return DB::transaction(function () use ($post, $data) {
            $post->update($data);
            return $post->fresh();
        });
    }
    
    public function deletePost(Post $post): bool
    {
        return DB::transaction(function () use ($post) {
            return $post->delete();
        });
    }
} 