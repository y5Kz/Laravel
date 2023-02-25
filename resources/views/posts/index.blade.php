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
        <div class='row justify-content-center'>
          <button type='submit' class='btn btn-outline-success mt-3'>検索</button>
        </div>
      </form>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class='text-center'>投稿一覧</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <th scope='col'>
            <a href="{{ route('posts.show', ['post' => $post['id']]) }}">{{ $post['title'] }}</a>
          </th>
        </tr>
        @endforeach
        <tr>
          <th scope='col'>
            {{ $posts->links() }}
          </th>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection