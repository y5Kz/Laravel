@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center mb-5">
    <a href="{{ route('mys.edit', Auth::user()->id) }}">{{ $user->name }}</a>
  </div>
  <div class="row justify-content-center">
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
        <button type='submit' class='btn btn-outline-success mt-3 mb-3'>検索</button>
      </div>
    </form>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col" class='text-center'>作成した投稿</th>
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
  <form action="{{ route('mys.store')}}" method="post">
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
    @csrf
    <div class="form-group">
      <label for="req">新ゲームタイトルリクエスト</label>
      <textarea class="form-control" name='req' id="exampleFormControlTextarea1" rows="1"></textarea>
      <div class='row justify-content-around mt-2 mb-5'>
        <button type="submit" class="btn btn-outline-success">送信</button>
      </div>
    </div>
  </form>
</div>
@endsection