@extends('layouts.main2')

@section('content')
    @if(!$messages->isEmpty())

        @foreach($messages as $message)
            <b> {{$message->house->address}}:</b>
            <hr>
            {{$message->user->name}}:
            <br>
            {{$message->content}}
            <br>
            <hr>

        @endforeach

    @else
        <div class="col-lg-4">
            <h3>Houses don't have messages</h3>
        </div>
    @endif


@endsection