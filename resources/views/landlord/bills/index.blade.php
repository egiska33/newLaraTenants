@extends('layouts.landlord')

@section('content')

    @foreach($bills as $bill)

        {{$bill->type}}{{$bill->total}}

    @endforeach

@endsection