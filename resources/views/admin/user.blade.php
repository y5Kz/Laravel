@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center col-md-4'><a href="{{ route('limits.index') }}" style="color:lime">投稿管理</a></th>
                    <th scope="col" class='text-center col-md-4' style="color:white">ユーザ管理</th>
                    <th scope="col" class='text-center col-md-4'><a href="{{ route('reqs.index') }}" style="color:lime">要望管理</a></th>
                </tr>
            </thead>
        </table>
        <div class="form-group">
            <form action="{{ route('users.index')}}" method="get">
                <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="user_name" placeholder="表示名" @if(isset($request->user_name)) value="{{ $request->user_name }}" @endif>
                </div>
                <div class='row justify-content-center'>
                    <button type='submit' class='btn btn-outline-success mt-1' style="color:lime">検索</button>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center col-md-12' style="color:white">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ユーザー</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope='col' style="color:white" class='list'>
                        {{ $user['id'] }}&emsp;{{ $user['name'] }}
                        <form action="{{route('users.destroy', ['user' => $user['id']]) }}" method="post" class="float-right">
                            @csrf
                            @method('delete')
                            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("そのユーザーの投稿も削除されます。本当に実行しますか？");'>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
<style>
    .list:hover {
        background-color: #003b19;
    }
</style>