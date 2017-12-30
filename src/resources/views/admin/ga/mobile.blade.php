@extends('UIAdmin::layouts.admin') 

@section('title') 
Analytics 
@endsection 
@push('breadcrumb')
@include('UIAdmin::admin.partials.breadcrumb', ['link' => trans('UIAdmin::googleanalytics.mobile-traffic') ])
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
                    <th style="width: 40%">Mobile Device Info</th>
                    <th style="width: 30%">Source</th>
                    <th>Sessions</th>
                    <th>Pageviews</th>
                    <th>Session Duration</th>
                </tr>
                @foreach($entries as $item)
                <tr>
                    <td>{{ $item[0] }}</td>
                    <td>{{ $item[1] }}</td>
                    <td>{{ $item[2] }}</td>
                    <td>{{ $item[3] }}</td>
                    <td>{{ $item[4] }}</td>
                </tr>
                @endforeach
            {{ $entries->withPath('analytics-mobile')->links('UIAdmin::admin.partials.pagination.default') }}
            </table>
        </div>
    </div>
</div>

@endsection