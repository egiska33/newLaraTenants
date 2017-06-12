@extends('layouts.')

@section('content')

{{$user->name}}
    <br>
    {{$user->email}}
    <br>
    {{$user->created_at}}

@endsection