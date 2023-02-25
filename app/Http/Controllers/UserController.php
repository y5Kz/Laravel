<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Game;

use App\Req;

use App\rep;

use App\user;

use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $username = $request->input('user_name');
        $user = User::get(['id', 'name']);

        if (empty($username)) {
            $users = $user;
        } else {
            $users = $user->where('name', '=', $username);
        }

        
        return view('admin.user', [
            'users' => $users,
            'request' => $request,
        ]);

        // $username = $request->input('user_name');
        // $user = User::get(['id', 'name']);

        // $users = $user->where('name', 'LIKE', "%{$username}%");

        // return view('admin.user', [
        //     'users' => $users,
        //     'request' => $request,
        // ]);
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
        $users = new User;
        $posts = new Post;
        $reps = new Rep;
        $reqs = new Req;
        $user = $users->find($id);

        $post = $posts->where('user_id', '=', $id);
        $rep = $reps->where('user_id', '=', $id);
        $req = $reqs->where('user_id', '=', $id);

        $post->delete();
        $rep->delete();
        $req->delete();
        $user->delete();

        return redirect('/users');
    }
}
