@extends('layouts.main')

@section('content')

    @foreach($bills as $bill)

        {{$bill->type}}{{$bill->total}}
        <br>

    @endforeach

@endsection