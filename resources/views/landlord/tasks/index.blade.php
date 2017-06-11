@extends('layouts.main')

@section('content')
    @if(!$tasks->isEmpty())

        @foreach($tasks as $task)

            {{$task->content}}{{$task->created_at}}
            <br>

        @endforeach
        <div class="col-lg-4">
            <a href="#" class="btn btn-info tip" title=""><i
                        class="fa fa-address-book-o"></i> NewTask</a>
        </div>
    @else
        <div class="col-lg-4">
            <h3>House don't have tasks</h3>
            <a href="#" class="btn btn-info tip" title=""><i
                        class="fa fa-address-book-o"></i> NewTask</a>
        </div>
    @endif
@endsection
