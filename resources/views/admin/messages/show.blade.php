@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.message.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.message.fields.content')</th>
                            <td>{{ $message->content }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message.fields.house')</th>
                            <td>{{ $message->house->city or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.house.fields.address')</th>
                            <td>{{ isset($message->house) ? $message->house->address : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message.fields.user')</th>
                            <td>{{ $message->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ isset($message->user) ? $message->user->email : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.message.fields.created-by')</th>
                            <td>{{ $message->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.messages.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop