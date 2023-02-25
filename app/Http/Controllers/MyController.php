<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReqData;

use App\Http\Requests\NameData;

use App\Post;

use App\Game;

use App\Req;

use App\Rep;

use App\User;

use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $gameid = $request->input('game_id');
        $post = new post;

        if (empty($gameid)) {
            $pos = $post->where('user_id', '=', $user->id)->where('del_flg', '=', 0)->orderby('created_at', 'DESC')->paginate(10);
        } else {
            $pos = $post->where('user_id', '=', $user->id)->where('del_flg', '=', 0)->where('game_id', '=', $gameid)->orderby('created_at', 'DESC')->paginate(10);
        }

        $game = new game;
        $gam = $game->all();


        return view('/mypage', [
            'user' => $user,
            'games' => $gam,
            'posts' => $pos,
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
    public function store(ReqData $request)
    {
        $req = new req;
        $req->req = $request->yobo;
        $req->user_id = Auth::user()->id;


        $req->save();

        $user = Auth::user();

        $gameid = $request->input('game_id');
        $post = new post;

        if (empty($gameid)) {
            $pos = $post->where('user_id', '=', $user->id)->where('del_flg', '=', 0)->orderby('created_at', 'DESC')->paginate(10);
        } else {
            $pos = $post->where('user_id', '=', $user->id)->where('del_flg', '=', 0)->where('game_id', '=', $gameid)->orderby('created_at', 'DESC')->paginate(10);
        }

        $game = new game;
        $gam = $game->all();


        return view('/mypage', [
            'user' => $user,
            'games' => $gam,
            'posts' => $pos,
            'request' => $request,

        ]);
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
        $user = Auth::User();
        return view('my.name', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NameData $request, $id)
    {
        $user = Auth::user()->find($id);

        $user->name = $request->name;

        $user->save();

        $gameid = $request->input('game_id');
        $post = new post;

        if (empty($gameid)) {
            $pos = $post->where('user_id', '=', $user->id)->where('del_flg', '=', 0)->orderby('created_at', 'DESC')->paginate(10);
        } else {
            $pos = $post->where('user_id', '=', $user->id)->where('del_flg', '=', 0)->where('game_id', '=', $gameid)->orderby('created_at', 'DESC')->paginate(10);
        }

        $game = new game;
        $gam = $game->all();


        return view('/mypage', [
            'user' => $user,
            'games' => $gam,
            'posts' => $pos,
            'request' => $request,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
