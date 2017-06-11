@extends('layouts.main')

@section('content')

    @foreach($tasks as $task)

        {{$task->content}}{{$task->created_at}}
        <br>

    @endforeach

@endsection
