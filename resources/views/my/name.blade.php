@extends('layouts.app')
@section('content')
<div class="container">
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
    <div class="row justify-content-center">
        <form action="{{ route('mys.update', Auth::user()->id) }}" method="post" class="form-inline">
            @csrf
            @method('patch')
            <div class="form-group mb-2">
                表示名
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only"></label>
                <input type="text" class="form-control" id="inputPassword2" name="name" value="{{ $user->name }}">
            </div>
            <button type="submit" class="btn btn-outline-success mb-2">変更</button>
        </form>
    </div>
</div>
@endsection