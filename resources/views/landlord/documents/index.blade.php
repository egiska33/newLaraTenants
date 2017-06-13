@extends('layouts.main')

@section('content')
    <div class="container">
        @if(!$documents->isEmpty())

            <div class="col-md-12">
                <div class="uploaded-doc">
                    <div class="row">
                        @foreach($documents as $document)
                            <div class="col-md-2 col-sm-4 padding15">
                                <div class="uploaded-img">
                                    <a href="{{route('view.landlord.document',['id'=> $house->id, 'document_id'=> $document->id])}}">
                                        <img src="https://infograins.com/INFODE/pankaj/dj/inner-box.png">
                                        <div class="immer-img">
                                            <img src="https://infograins.com/INFODE/pankaj/dj/box.png">
                                        </div>
                                        <div class="position-absulute">
                                            <div class="paper-doc1 paper-doc"></div>
                                            <div class="paper-doc2 paper-doc"></div>
                                            <div class="paper-doc3 paper-doc"></div>
                                        </div>
                                        <div class="abslt-text">
                                            <h4>{{$document->title}}</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

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
    </div>
@endsection
