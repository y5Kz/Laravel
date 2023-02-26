@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center col-md-4'><a href="{{ route('limits.index') }}" style="color:lime">投稿管理</a></th>
                    <th scope="col" class='text-center col-md-4' style="color:white">要望管理</th>
                    <th scope="col" class='text-center col-md-4'><a href="{{ route('users.index') }}" style="color:lime">ユーザー管理</a></th>
                </tr>
            </thead>
        </table>
        <div class="form-group">
            <form action="{{ route('reqs.store')}}" method="post">
                @csrf
                <div class='panel-body'>
                    @if($errors->any())
                    <div class='alert alert-danger'>
                        <ul>
                            @foreach($errors->all() as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="form-group mt-2">
                    <label for="name"></label>
                    <textarea class="form-control" name='name' id="exampleFormControlTextarea1" rows="1"></textarea>
                    <div class='row justify-content-around mt-2 mb-5'>
                        <button type="submit" class="btn btn-outline-warning mt-1" onclick="return confirm('本当に追加しますか？')">追加</button>
                    </div>
                </div>
            </form>
            <form action="{{ route('reqs.index')}}" method="get">
                <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="req" placeholder="要望" @if(isset($request->req)) value="{{ $request->req }}" @endif>
                </div>
                <div class='row justify-content-center'>
                    <button type='submit' class='btn btn-outline-success mt-1' style="color:lime">検索</button>
                </div>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center col-md-12' style="color:white">ゲームタイトル要望</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reqs as $req)
                <tr>
                    <th scope='col' style="color:white" class='list'>
                        {{ $req['req'] }}
                        <form action="{{route('reqs.destroy', ['req' => $req['id']]) }}" method="post" class="float-right">
                            @csrf
                            @method('delete')
                            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に実行しますか？");'>
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