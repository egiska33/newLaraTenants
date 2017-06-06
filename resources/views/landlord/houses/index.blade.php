@extends('layouts.landlord')

@section('content')

    <div class="row">
        @can('house_create')
            <div class="col-md-12">
                <a class="btn btn-success" href="{{ route('landlord.houses.create') }}">Create House</a>
            </div>
        @endcan
    </div>

    <div class="row">
        @foreach($houses as $house)
            <div class="col-md-3 customContainer">
                <a class="btn custom @if($house->tenant_id == null) InactiveHouse @else ActiveHouse @endif" href="{{route('view.house')}}">
                    <div class="houseContainer"><i class="fa fa-university house" aria-hidden="true"></i></div>
                    <br>
                    <div class="customText">{{$house->address}}</div>
                </a>
            </div>
        @endforeach
    </div>


@endsection




