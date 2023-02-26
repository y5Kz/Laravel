@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class='text-center' style="color:white">{{ $post->title }}</th>
                </tr>
                <tr>
                    <td scope="col" class='text-center' style="color:white">{{ $post->user->name }}<br>
                        @if(file_exists(public_path().'/storage/image/'. $post->id .'.jpg'))
                        <img src="/storage/image/{{ $post->id }}.jpg" width="50%" height="50%">
                        @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.jpeg'))
                        <img src="/storage/image/{{ $post->id }}.jpeg" width="50%" height="50%">
                        @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.png'))
                        <img src="/storage/image/{{ $post->id }}.png" width="50%" height="50%">
                        @elseif(file_exists(public_path().'/storage/image/'. $post->id .'.gif'))
                        <img src="/storage/image/{{ $post->id }}.gif" width="50%" height="50%">
                        @endif
                        <br>{{ $post->content }}<br>{{ $post->created_at }}
                    </td>
                </tr>
            </thead>
        </table>
        <table class="table">
            <tbody class="reply">
                @foreach($rep as $reps)
                <tr>
                    <td scope="col" class='text-center' style="color:white">{{ $reps['user']['name'] }}<br>{{ $reps['reply'] }}<br>{{ $reps['created_at'] }}</td>
                </tr>
                @endforeach
                <tr>
                    <th scope='col'>
                        {{ $rep->links() }}
                    </th>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('ajax.button')}}" method="post">
            @csrf
            <div class="form-group">
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
                <label for="reply"></label>
                <input type='hidden' name="post" data-id="{{$post['id']}}" value="{{$post['id']}}" id="post_id" />
                <textarea class="form-control" name='reply' id="replyform" rows="5"></textarea>
                <div class='row justify-content-around mt-2 mb-5'>
                    <button type="button" class="btn btn-outline-success" id="fire" style="color:lime">投稿</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection