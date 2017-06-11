@extends('layouts.main')

@section('content')
    @if(!$bills->isEmpty())

        @foreach($bills as $bill)

            {{$bill->type}}{{$bill->total}}
            <br>

        @endforeach
        <div class="col-lg-4">
            <a href="#" class="btn btn-info tip" title=""><i
                        class="fa fa-address-book-o"></i> NewBill</a>
        </div>
    @else
        <div class="col-lg-4">
            <h3>House don't have bills</h3>
            <a href="#" class="btn btn-info tip" title=""><i
                        class="fa fa-address-book-o"></i> NewBill</a>
        </div>
    @endif

@endsection
