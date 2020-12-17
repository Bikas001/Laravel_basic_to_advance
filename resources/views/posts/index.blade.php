@extends('layouts.app')



@section('content')
    <ul>
        @foreach($posts as $post)
            <br>
            <img src="{{$post->path}}" width="100" alt="">
            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
                <br>
{{--                <form method="post"  action="posts/{{$post->id}}">--}}

                {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\PostController@destroy',$post->id]]) !!}




                {!! Form::submit('Delete Post' , ['class'=>'btn btn-danger']) !!}

                {!! Form::close() !!}


            </li>
        @endforeach
    </ul>
@endsection
