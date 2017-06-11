@extends('layouts.main')

@section('content')

    @foreach($documents as $document)

        <b>{{$document->title}}:</b>
        <br>
        {{$document->content}}
        <br>

    @endforeach

@endsection
