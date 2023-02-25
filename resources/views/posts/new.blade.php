@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center'>新規投稿</th>
                </tr>
            </thead>
        </table>
        <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1"></label>
                <select class="form-control" id="exampleFormControlSelect1" name="game_id">
                    <option value="" hidden>カテゴリ</option>
                    @foreach($games as $game)
                    <option value="{{ $game['id']}}">{{ $game['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1"></label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="タイトル" value="{{ old('title')}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="10">{{ old('content')}}</textarea>
            </div>
            <div class="form-group">
                <input id="image" type="file" name="image">
            </div>
            <div class='row justify-content-around mt-2 mb-5'>
                <button type="submit" class="btn btn-outline-success">投稿</button>
            </div>
        </form>
    </div>
</div>
@endsection