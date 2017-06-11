@extends('layouts.main2')

@section('content')
    @if(!$tenants->isEmpty())

        @foreach($tenants as $tenant)
            <b> {{$tenant->name}}:</b>
            <br>
            {{$tenant->email}}{{$tenant->phone}}
            <hr>

        @endforeach

    @else
        <div class="col-lg-4">
            <h3>Houses don't have Tenants</h3>
        </div>
    @endif


@endsection