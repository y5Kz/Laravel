@extends('layouts.app')
@section('content')
<div class="container">
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
            <label for="yobo">新ゲームタイトルリクエスト</label>
            <textarea class="form-control" name='yobo' id="exampleFormControlTextarea1" rows="1"></textarea>
            <div class='row justify-content-around mt-2 mb-5'>
                <button type="submit" class="btn btn-outline-success">送信</button>
            </div>
        </div>
    </form>
</div>
@endsection