@extends('layouts.main2')

@section('content')
    @if(!$tenants->isEmpty())

        @foreach($tenants as $tenant)
            <a href="{{route('show.tenant.house', $tenant->id)}}"><b> {{$tenant->name}}:</b></a>
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