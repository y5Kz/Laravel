<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GameData;

use App\Post;

use App\Game;

use App\Req;

use App\rep;

use App\user;

use Illuminate\Support\Facades\Auth;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $username = $request->input('user_name');
        // $user = User::get(['id', 'name']);

        // if (empty($username)) {
        //     $users = $user;
        // } else {
        //     $users = $user->where('name', '=', $username);
        // }

        // return view('admin.user', [
        //     'users' => $users,
        //     'request' => $request,
        // ]);

        $requ = $request->input('req');
        $req = Req::get(['id', 'req']);

        if (empty($requ)) {
            $reqs = $req;
        } else {
            $reqs = $req->where('req', '=', $requ);
        }

        return view('admin.req', [
            'reqs' => $reqs,
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
    public function store(GameData $request)
    {
        $game = new Game;
        $game->name = $request->name;


        $game->save();

        $requ = $request->input('req');
        $req = Req::get(['id', 'req']);

        if (empty($requ)) {
            $reqs = $req;
        } else {
            $reqs = $req->where('req', '=', $requ);
        }

        return view('admin.req', [
            'reqs' => $reqs,
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
        $reqs = new Req;
        $req = $reqs->find($id);

        $req->delete();

        return redirect('/reqs');
    }
}
