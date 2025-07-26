<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use App\Models\Board;
use App\Models\Comment;
use App\Models\Thread;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run(){
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Board::factory(10)->create();
        Thread::factory(10*10)->create();
        Comment::factory(10*10*2)->create();

    }
}