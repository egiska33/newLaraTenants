@extends('layouts.landlord')

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
        @if(!$tenant->isEmpty())
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>House have tenant:</h3>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                    <div class="stats-buttons-grid">
                        <div class="row">
                            <div class="col-lg-4 ">
                                <div class="thumbnail" align="center">

                                    <div class="icon green">
                                         <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                                    </div>
                                    <div class="caption">
                                        <h3>{{$tenant[0]->name}}</h3>
                                        <p>{{$tenant[0]->email}}</p>
                                        <p align="center">
                                            {{--@can('user_delete')--}}
                                                {{--{!! Form::open(array(--}}
                                                    {{--'style' => 'display: inline-block;',--}}
                                                    {{--'method' => 'DELETE',--}}
                                                    {{--'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",--}}
                                                    {{--'route' => ['admin.users.destroy', $tenant[0]->id])) !!}--}}
                                                {{--{!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-danger tip delete-action')) !!}--}}
                                                {{--{!! Form::close() !!}--}}
                                            {{--@endcan--}}
                                            <a href="{{route('delete.tenant', $house->id)}}" class="btn btn-danger tip delete-action" title=""><i class="fa fa-trash-o"></i> Delete</a>
                                            <a href="#" class="btn btn-info tip" title=""><i class="fa fa-cloud-download"></i> View</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
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