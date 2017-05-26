@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.documents.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.documents.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('file', 'File', ['class' => 'control-label']) !!}
                    {!! Form::file('file', ['class' => 'form-control']) !!}
                    {!! Form::hidden('file_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file'))
                        <p class="help-block">
                            {{ $errors->first('file') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('house_id', 'House id', ['class' => 'control-label']) !!}
                    {!! Form::select('house_id', $houses, old('house_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('house_id'))
                        <p class="help-block">
                            {{ $errors->first('house_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('content'))
                        <p class="help-block">
                            {{ $errors->first('content') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

