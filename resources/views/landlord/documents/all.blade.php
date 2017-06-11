@extends('layouts.main2')

@section('content')
    @if(!$documents->isEmpty())

        @foreach($documents as $document)
            <b> {{$document->house->address}}:</b>
            <br>
            {{$document->title}}:
            <br>
            {{$document->content}}
            <hr>

        @endforeach

    @else
        <div class="col-lg-4">
            <h3>Houses don't have Documents</h3>
        </div>
    @endif
@endsection


