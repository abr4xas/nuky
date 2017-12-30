@extends('UIAdmin::layouts.admin') 

@section('title') 
Analytics 
@endsection 
@push('breadcrumb')
@include('UIAdmin::admin.partials.breadcrumb', ['link' => trans('UIAdmin::googleanalytics.operatingsystem') ])
@endpush
@section('content')
<div uk-grid>
    <div class="uk-width-expand@m">
        <div class="uk-card uk-card-default uk-card-body">
            <span class="statistics-text">
                {{ $description }}
            </span>
            <table class="uk-table">
                <tr>
                    <th>Operating System</th>
                    <th>Operating System Version</th>
                    <th>Browser</th>
                    <th>Browser Version</th>
                    <th>Sessions</th>
                </tr>
                @foreach($entries as $key => $item)
                <tr>
                    <td>{{ $item[0]  }}</td>
                    <td>{{ $item[1]  }}</td>
                    <td>{{ $item[2]  }}</td>
                    <td>{{ $item[3]  }}</td>
                    <td>{{ $item[4]  }}</td>
                </tr>
                @endforeach
            {{ $entries->withPath('analytics-operating')->links('UIAdmin::admin.partials.pagination.default') }}
            </table>
        </div>
    </div>
</div>

@endsection