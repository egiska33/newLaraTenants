@extends('layouts.main2')

@section('content')
    @if(!$tenants->isEmpty())
        <div class="container">
            <div class="row">
                <div class="stats-buttons-grid">
                    <div class="row">
                        @foreach($tenants as $tenant)
                            <a href="{{route('show.tenant.house', $tenant->id)}}" class="userCard">
                                <div class="col-md-4 ">
                                    <div class="thumbnail" align="center">

                                        <div class="icon green">
                                            <img id="profile-img" class="profile-img-card"
                                                 src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
                                        </div>
                                        <div class="caption">
                                            <h3>{{$tenant->name}}</h3>
                                            <p>{{$tenant->email}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        @endforeach

                        @else
                            <div class="col-lg-4">
                                <h3>Houses don't have Tenants</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


@endsection