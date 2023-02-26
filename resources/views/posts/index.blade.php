@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="form-group">
      <label for="exampleFormControlSelect1">ゲームタイトル選択</label>
      <form action="" method="get">
        <select name='game_id' class="form-control" id="exampleFormControlSelect1">
          <option value=''></option>
          @foreach($games as $game)
          @if($game['id'] == $request->game_id)
          <option value="{{ $game['id']}}" selected>{{ $game['name'] }}</option>
          @else
          <option value="{{ $game['id']}}">{{ $game['name'] }}</option>
          @endif
          @endforeach
        </select>
        <div class="form-group">
          <label for="exampleFormControlInput1"></label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="タイトル" @if(isset($request->title)) value="{{ $request->title }}" @endif>
        </div>
        <div class='row justify-content-center'>
          <button type='submit' class='btn btn-outline-success mt-3' style="color:lime">検索</button>
        </div>
      </form>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class='text-center' style="color:white">投稿一覧</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <th scope='col' class='list'>
            <a href="{{ route('posts.show', ['post' => $post['id']]) }}" style="color:lime">{{ $post['title'] }}</a>
          </th>
        </tr>
        @endforeach
        <tr>
          <th scope='col' class="row justify-content-center">
            {{ $posts->links() }}
          </th>
        </tr>
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