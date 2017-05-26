@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.house.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.houses.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('landlord_id', 'Landlord id*', ['class' => 'control-label']) !!}
                    {!! Form::select('landlord_id', $landlords, old('landlord_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('landlord_id'))
                        <p class="help-block">
                            {{ $errors->first('landlord_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('tenant_id', 'Tenant id', ['class' => 'control-label']) !!}
                    {!! Form::select('tenant_id', $tenants, old('tenant_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tenant_id'))
                        <p class="help-block">
                            {{ $errors->first('tenant_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('city', 'City*', ['class' => 'control-label']) !!}
                    {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address', 'Address*', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

