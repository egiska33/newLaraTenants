@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.task.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.task.fields.content')</th>
                            <td>{{ $task->content }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.task.fields.photo')</th>
                            <td>@if($task->photo)<a href="{{ asset('uploads/' . $task->photo) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.task.fields.house')</th>
                            <td>{{ $task->house->city or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.address')</th>
                            <td>{{ isset($task->house) ? $task->house->address : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tasks.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop