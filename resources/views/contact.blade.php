@extends('layouts.app')



@section('content')

<h1>Contact page</h1>

    @if($people)
        <ul>
        @foreach($people as $pupil)
            <li>{{$pupil}}</li>

        @endforeach
        </ul>

    @endif



@stop

@section('footer')


@stop
