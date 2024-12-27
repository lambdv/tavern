<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tavern;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        //$posts = Post::all();
        $posts = Post::with('tavern')->orderBy('created_at', 'desc')->paginate(10);
        return view('home.index', ["greeting"=>"welcome back!", "posts"=> $posts]);
    }

    public function show($id){
        $post = Post::with('tavern')->findOrFail($id);
        return view('home.post', ["post"=>$post]);
    }

    public function create(){
        $taverns = Tavern::all();
        return view('home.create', ['taverns' => $taverns]);
    }

    public function store(Request $req){
        $validated = $req->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|min:1',
            'tavern_id' => 'required|exists:taverns,id'
        ]);
        Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'tavern_id' => $validated['tavern_id'],
            'user_id' => 1,
            'trending' => false
        ]);

        return redirect()->route('index')->with('success', 'Post created successfully!');
    }

    public function destroy(Post $post){
        $post->delete(); //sends query to the table to delete the record
        return redirect()->route('index')->with('success', 'Post deleted successfully!');
    }
}
