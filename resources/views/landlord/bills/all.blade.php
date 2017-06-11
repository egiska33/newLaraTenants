@extends('layouts.main2')

@section('content')
    @if(!$bills->isEmpty())

        @foreach($bills as $bill)
            <b> {{$bill->house->address}}:</b>
            <br>
            {{$bill->type}}{{$bill->total}}
            <hr>

        @endforeach

    @else
        <div class="col-lg-4">
            <h3>Houses don't have bills</h3>
        </div>
    @endif


@endsection