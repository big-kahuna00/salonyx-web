@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.locations.title')</h3>
    <p>
        <a href="{{ route('admin.locations.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($locations) > 0 ? 'datatable' : '' }} @can('location_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('location_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.locations.fields.name')</th>
                        <th>@lang('quickadmin.locations.fields.street-address')</th>
                        <th>@lang('quickadmin.locations.fields.city')</th>
                        <th>@lang('quickadmin.locations.fields.state')</th>
						<th>@lang('quickadmin.locations.fields.zip')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($locations) > 0)
                        @foreach ($locations as $location)
                            <tr data-entry-id="{{ $location->id }}">
                                @can('location_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $location->name }}</td>
                                <td>{{ $location->street_address }}</td>
                                <td>{{ $location->city }}</td>
                                <td>{{ $location->state }}</td>
                                <td>{{ $location->zip }}</td>
                                <td>

                                    <a href="{{ route('admin.locations.show',[$location->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    <a href="{{ route('admin.locations.edit',[$location->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.locations.destroy', $location->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}

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
    </div>
@stop

@section('javascript') 
    <script>
        @can('location_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.locations.mass_destroy') }}';
        @endcan

    </script>
@endsection