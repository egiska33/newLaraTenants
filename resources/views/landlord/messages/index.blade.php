@extends('layouts.main')

@section('content')

    @foreach($messages as $message)

        {{$message->user->name}}: {{$message->content}}
        <br>

    @endforeach

@endsection
