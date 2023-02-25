<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Game;

use App\Req;

use App\rep;

use App\user;

use Illuminate\Support\Facades\Auth;

class limitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gameid = $request->input('game_id');
        $title = $request->input('title');
        $username = $request->input('user_name');
        $post = Post::where('del_flg', 0);
        $user = User::get(['id', 'name']);


        if ($gameid) {
            $post->where('game_id', $gameid);
        }
        if ($title) {
            $post->where('title', 'LIKE', "%{$title}%");
        }
        if ($username) {
            $post->whereHas('user', function ($q) use ($username) {
                $q->where('name', 'LIKE', "%{$username}%");
            });
        }

        $post = $post->orderby('created_at', 'DESC')->paginate(10);

        $game = Game::all();

        return view('admin.limit', [
            'games' => $game,
            'posts' => $post,
            'user' => $user,
            'request' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = new Post;
        $post = $posts->find($id);

        $post->delete();

        return redirect('admin.limit');
    }
}
