@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.locations.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.locations.fields.name')</th>
                            <td>{{ $employee->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.locations.fields.street_address')</th>
                            <td>{{ $employee->street_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.locations.fields.city')</th>
                            <td>{{ $employee->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.locations.fields.state')</th>
                            <td>{{ $employee->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.locations.fields.zip')</th>
                            <td>{{ $employee->zip }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->

            <p>&nbsp;</p>

            <a href="{{ route('admin.locations.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop