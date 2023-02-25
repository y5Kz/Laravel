<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Game;

use App\Req;

use App\rep;

use App\user;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin(Request $request)
    {
        // $gameid = $request->input('game_id');
        // $title = $request->input('title');
        // $username = $request->input('user_name');
        // $post = Post::where('del_flg', 0);
        // $user = User::get(['id', 'name']);


        // if ($gameid) {
        //     $post->where('game_id', $gameid);
        // }
        // if ($title) {
        //     $post->where('title', 'LIKE', "%{$title}%");
        // }
        // if ($username) {
        //     $post->whereHas('user', function ($q) use ($username) {
        //         $q->where('name', 'LIKE', "%{$username}%");
        //     });
        // }

        // $post = $post->orderby('created_at', 'DESC')->paginate(10);

        // $game = Game::all();

        // return view('admin.limit', [
        //     'games' => $game,
        //     'posts' => $post,
        //     'user' => $user,
        //     'request' => $request,
        // ]);
    }
}
