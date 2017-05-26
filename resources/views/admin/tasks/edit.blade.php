@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.task.title')</h3>
    
    {!! Form::model($task, ['method' => 'PUT', 'route' => ['admin.tasks.update', $task->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('content', 'Content*', ['class' => 'control-label']) !!}
                    {!! Form::text('content', old('content'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('content'))
                        <p class="help-block">
                            {{ $errors->first('content') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('photo', 'Photo', ['class' => 'control-label']) !!}
                    @if ($task->photo)
                        <a href="{{ asset('uploads/' . $task->photo) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('photo', ['class' => 'form-control']) !!}
                    {!! Form::hidden('photo_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('photo'))
                        <p class="help-block">
                            {{ $errors->first('photo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('house_id', 'House id*', ['class' => 'control-label']) !!}
                    {!! Form::select('house_id', $houses, old('house_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('house_id'))
                        <p class="help-block">
                            {{ $errors->first('house_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

