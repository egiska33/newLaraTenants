@extends('layouts.main')

@section('content')

    @if(!$documents->isEmpty())
        @foreach($documents as $document)

            <b>{{$document->title}}:</b>
            <br>
            {{$document->content}}
            <br>

        @endforeach
        <div class="col-lg-4">
            <a href="#" class="btn btn-info tip" title=""><i
                        class="fa fa-address-book-o"></i> NewDocument</a>
        </div>
    @else
        <div class="col-lg-4">
            <h3>House don't have documents</h3>
            <a href="#" class="btn btn-info tip" title=""><i
                        class="fa fa-address-book-o"></i> NewDocument</a>
        </div>
    @endif
@endsection
