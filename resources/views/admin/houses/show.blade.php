@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.house.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.house.fields.landlord')</th>
                            <td>{{ $house->landlord->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ isset($house->landlord) ? $house->landlord->email : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.tenant')</th>
                            <td>{{ $house->tenant->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ isset($house->tenant) ? $house->tenant->email : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.city')</th>
                            <td>{{ $house->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.address')</th>
                            <td>{{ $house->address }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#message" aria-controls="message" role="tab" data-toggle="tab">Message</a></li>
<li role="presentation" class=""><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Documents</a></li>
<li role="presentation" class=""><a href="#bill" aria-controls="bill" role="tab" data-toggle="tab">Bill</a></li>
<li role="presentation" class=""><a href="#task" aria-controls="task" role="tab" data-toggle="tab">Task</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="message">
<table class="table table-bordered table-striped {{ count($messages) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.message.fields.content')</th>
                        <th>@lang('quickadmin.message.fields.house')</th>
                        <th>@lang('quickadmin.house.fields.address')</th>
                        <th>@lang('quickadmin.message.fields.user')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <th>@lang('quickadmin.message.fields.created-by')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($messages) > 0)
            @foreach ($messages as $message)
                <tr data-entry-id="{{ $message->id }}">
                    <td>{{ $message->content }}</td>
                                <td>{{ $message->house->city or '' }}</td>
<td>{{ isset($message->house) ? $message->house->address : '' }}</td>
                                <td>{{ $message->user->name or '' }}</td>
<td>{{ isset($message->user) ? $message->user->email : '' }}</td>
                                <td>{{ $message->created_by->name or '' }}</td>
                                <td>
                                    @can('message_view')
                                    <a href="{{ route('admin.messages.show',[$message->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('message_edit')
                                    <a href="{{ route('admin.messages.edit',[$message->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('message_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.messages.destroy', $message->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="documents">
<table class="table table-bordered table-striped {{ count($documents) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.documents.fields.title')</th>
                        <th>@lang('quickadmin.documents.fields.file')</th>
                        <th>@lang('quickadmin.documents.fields.house')</th>
                        <th>@lang('quickadmin.house.fields.address')</th>
                        <th>@lang('quickadmin.documents.fields.content')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($documents) > 0)
            @foreach ($documents as $document)
                <tr data-entry-id="{{ $document->id }}">
                    <td>{{ $document->title }}</td>
                                <td>@if($document->file)<a href="{{ asset('uploads/' . $document->file) }}" target="_blank">Download file</a>@endif</td>
                                <td>{{ $document->house->city or '' }}</td>
<td>{{ isset($document->house) ? $document->house->address : '' }}</td>
                                <td>{!! $document->content !!}</td>
                                <td>
                                    @can('document_view')
                                    <a href="{{ route('admin.documents.show',[$document->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('document_edit')
                                    <a href="{{ route('admin.documents.edit',[$document->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('document_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.documents.destroy', $document->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="bill">
<table class="table table-bordered table-striped {{ count($bills) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.bill.fields.type')</th>
                        <th>@lang('quickadmin.bill.fields.total')</th>
                        <th>@lang('quickadmin.bill.fields.house')</th>
                        <th>@lang('quickadmin.house.fields.address')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($bills) > 0)
            @foreach ($bills as $bill)
                <tr data-entry-id="{{ $bill->id }}">
                    <td>{{ $bill->type }}</td>
                                <td>{{ $bill->total }}</td>
                                <td>{{ $bill->house->city or '' }}</td>
<td>{{ isset($bill->house) ? $bill->house->address : '' }}</td>
                                <td>
                                    @can('bill_view')
                                    <a href="{{ route('admin.bills.show',[$bill->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('bill_edit')
                                    <a href="{{ route('admin.bills.edit',[$bill->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('bill_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.bills.destroy', $bill->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="task">
<table class="table table-bordered table-striped {{ count($tasks) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.task.fields.content')</th>
                        <th>@lang('quickadmin.task.fields.photo')</th>
                        <th>@lang('quickadmin.task.fields.house')</th>
                        <th>@lang('quickadmin.house.fields.address')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <tr data-entry-id="{{ $task->id }}">
                    <td>{{ $task->content }}</td>
                                <td>@if($task->photo)<a href="{{ asset('uploads/' . $task->photo) }}" target="_blank">Download file</a>@endif</td>
                                <td>{{ $task->house->city or '' }}</td>
<td>{{ isset($task->house) ? $task->house->address : '' }}</td>
                                <td>
                                    @can('task_view')
                                    <a href="{{ route('admin.tasks.show',[$task->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('task_edit')
                                    <a href="{{ route('admin.tasks.edit',[$task->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('task_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.tasks.destroy', $task->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.houses.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop