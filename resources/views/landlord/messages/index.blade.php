@extends('layouts.main')

@section('content')
    @if(!$messages->isEmpty())


        @foreach($messages as $message)

            {{$message->user->name}}: {{$message->content}}
            <br>

        @endforeach
        <div class="col-lg-4">
            <a href="#" class="btn btn-info tip" title=""><i
                        class="fa fa-address-book-o"></i> NewMessage</a>
        </div>
    @else
        <div class="col-lg-4">
            <h3>House don't have messages</h3>
            <a href="#" class="btn btn-info tip" title=""><i
                        class="fa fa-address-book-o"></i> NewMessage</a>
        </div>
    @endif
@endsection
