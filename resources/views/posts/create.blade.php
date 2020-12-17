@extends('layouts.app')



@section('content')
    <h1>Add page</h1>
{{--    <form method="POST" action="/posts">--}}
    {!! Form::open(['method'=>'POST', 'action' => 'App\Http\Controllers\PostController@store', 'files'=>true]) !!}

  <div class="form-group">
    {{ Form::label('title','Title:') }}

    {!! Form::text('title',null,['class'=>'form-control']) !!}
      <br>
      <div>
         {!! Form::file('file', ['class'=>'btn btn-primary']) !!}
      </div>
      <br>
{{--        <input type="text" name="title" placeholder="Enter Post Title">--}}
    {!! Form::submit('Create Post', ['class'=>'form-control']) !!}
  </div>
{{--        <input type="submit" name="submit">--}}
    {!! Form::close() !!}
{{--    </form>--}}




<div>

    @if(count($errors) > 0)
        <ul>
            @foreach($errors-> all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
</div>

@endsection
