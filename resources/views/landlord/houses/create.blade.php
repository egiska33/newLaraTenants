@extends('layouts.landlord')

@section('content')


    <form action="{{route('landlord.houses.store')}}" method="POST">
        {{ csrf_field() }}
        <input type="text" name="city" placeholder="City">
        <input type="text" name="address" placeholder="Address">
        <input type="text" name="landlord_id" value="{{Auth::user()->id}}" hidden>
        <input type="submit">
    </form>

@endsection