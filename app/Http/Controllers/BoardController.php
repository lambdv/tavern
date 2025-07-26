<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Comment;
use App\Models\Thread;

use App\Http\Requests\StoreBoardRequest;
use App\Http\Requests\UpdateBoardRequest;

class BoardController extends Controller
{

    public function boardsView()
    {
        $boards = Board::all();
        return view('pages.boards', [
            'boards' => $boards
        ]);
    }

    public function boardView(string $name){
        $board = Board::where('name', $name)->firstOrFail();
        $threads = Thread::where('board_id', $board->id)->get();

        return view('pages.board')->with([
            'board' => $board,
            'threads' => $threads,
        ]);
    }

    public function threadView(string $name, string $threadId){


        return view('pages.thread')
            ->with([
                'name' => $name,
                'threadId' => $threadId,
            ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoardRequest $request, Board $board)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        //
    }
}
