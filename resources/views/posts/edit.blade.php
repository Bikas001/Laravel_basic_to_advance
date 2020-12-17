@extends('layouts.app')



@section('content')
    <h1>Edit Page</h1>
    {!! Form::model($post , ['method'=>'PATCH', 'action' => ['App\Http\Controllers\PostController@update', $post->id]]) !!}
    {!! Form::token() !!}
    <div class="form-group">
        {{ Form::label('title','Title:') }}

        {!! Form::text('title',null,['class'=>'form-control']) !!}
        {{--        <input type="text" name="title" placeholder="Enter Post Title">--}}

       <div>
          {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
       </div>

    </div>
    {{--        <input type="submit" name="submit">--}}
    {!! Form::close() !!}


@stop



