@extends('layouts.landlord')

@section('content')

    @if($tenant->isEmpty())
        You dont have contacts

    @else
        {{$tenant[0]->name}}
    @endif
    @can('house_delete')
        {!! Form::open(array(
            'style' => 'display: inline-block;',
            'method' => 'DELETE',
            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
            'route' => ['admin.houses.destroy', $house->id])) !!}
        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
        {!! Form::close() !!}
    @endcan

@endsection