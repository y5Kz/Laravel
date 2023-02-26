<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateData;

use App\Post;

use App\Game;

use App\Req;

use App\rep;

use App\user;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $gameid = $request->input('game_id');
        // $post = new post;

        // if (empty($gameid)) {
        //     $pos = $post->where('del_flg', '=', 0)->orderby('created_at', 'DESC')->paginate(12);
        // } else {
        //     $pos = $post->where('del_flg', '=', 0)->where('game_id', '=', $gameid)->orderby('created_at', 'DESC')->paginate(12);
        // }

        // $game = new game;
        // $gam = $game->all();


        // return view('posts.index', [
        //     'games' => $gam,
        //     'posts' => $pos,
        //     'request' => $request,
        // ]);

        $gameid = $request->input('game_id');
        $title = $request->input('title');
        $post = Post::where('del_flg', 0);


        if ($gameid) {
            $post->where('game_id', $gameid);
        }
        if ($title) {
            $post->where('title', 'LIKE', "%{$title}%");
        }

        $post = $post->orderby('created_at', 'DESC')->paginate(11);

        $game = Game::all();

        return view('posts.index', [
            'games' => $game,
            'posts' => $post,
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
        $game = new game;
        $gam = $game->all();


        return view('posts.new', [
            'games' => $gam,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $post = new post;
        $reps = new rep;


        $post->game_id = $request->game_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;

        $post->save();

        if ($request->image) {

            if ($request->image->extension() == 'gif' || $request->image->extension() == 'jpeg' || $request->image->extension() == 'jpg' || $request->image->extension() == 'png') {
                $request->file('image')->storeAs('public/image', $post->id . '.' . $request->image->extension());
            }
        }

        // if (request('image')) {
        //     $filename = request()->file('image')->getClientOriginalName();
        //     $inputs['image'] = request('image')->storeAs('public/images', $filename);
        // }

        // $post->create($inputs);





        $gameid = $request->input('game_id');
        $post = new post;

        if (empty($gameid)) {
            $pos = $post->where('del_flg', '=', 0)->orderby('created_at', 'DESC')->paginate(12);
        } else {
            $pos = $post->where('del_flg', '=', 0)->where('game_id', '=', $gameid)->orderby('created_at', 'DESC')->paginate(12);
        }

        $game = new game;
        $gam = $game->all();


        return view('posts.index', [
            'games' => $gam,
            'posts' => $pos,
            'request' => $request,
        ]);


        // return view('posts.index', [
        //     'post' => $post,
        //     'rep' => $rep,
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = new post;

        $reps = new rep;

        $user = new user;


        $post = $posts->with('user')->find($id);

        $rep = $reps->with('user')->where('post_id', '=', $id)->paginate(100);




        return view('posts.detail', [
            'post' => $post,
            'rep' => $rep,
        ]);
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

        return redirect('limits');
    }
}
