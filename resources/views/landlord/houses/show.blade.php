@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span>House address: {{$house->address}}</span>
                @can('house_delete')
                    {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'DELETE',
                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                        'route' => ['admin.houses.destroy', $house->id])) !!}
                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                    {!! Form::close() !!}
                @endcan
            </div>
        </div>
        @if(!$users->isEmpty())
            <div class="container">
                @if($users[0]->role_id === 2)
                    <div class="row">
                        <div class="col-md-4">
                            <h3>This House Landlord:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="stats-buttons-grid">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="thumbnail" align="center">

                                        <div class="icon green">
                                            <img id="profile-img" class="profile-img-card"
                                                 src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
                                        </div>
                                        <div class="caption">
                                            <h3>{{$users[0]->name}}</h3>
                                            <p>{{$users[0]->email}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-4">
                            <h3>House have tenant:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="stats-buttons-grid">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="thumbnail" align="center">

                                        <div class="icon green">
                                            <img id="profile-img" class="profile-img-card"
                                                 src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
                                        </div>
                                        <div class="caption">
                                            <h3>{{$users[0]->name}}</h3>
                                            <p>{{$users[0]->email}}</p>
                                            <p align="center">
                                                <a href="{{route('delete.tenant', ['id'=>$house->id, 'tenant'=>$users[0]->id])}}"
                                                   class="btn btn-danger tip delete-action" title=""><i
                                                            class="fa fa-trash-o"></i> Delete</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif

            </div>
        @else
            <div class="col-lg-4">
                <h3>House don't have tenant</h3>
                <a href="{{route('landlord.tenant.create',$house->id)}}" class="btn btn-info tip" title=""><i
                            class="fa fa-address-book-o"></i> ADD</a>
            </div>
        @endif
    </div>
@endsection