@extends('layouts.main2')

@section('content')
    @if(!$tasks->isEmpty())

        @foreach($tasks as $task)
            <b> {{$task->house->address}}:</b>
            <br>
            {{$task->content}}
            <br>
            <hr>

        @endforeach

    @else
        <div class="col-lg-4">
            <h3>Houses don't have tasks</h3>
        </div>
    @endif


@endsection
