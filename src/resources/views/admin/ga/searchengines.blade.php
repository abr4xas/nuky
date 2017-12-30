@extends('UIAdmin::layouts.admin') 

@section('title') 
Analytics 
@endsection 
@push('breadcrumb')
@include('UIAdmin::admin.partials.breadcrumb', ['link' => trans('UIAdmin::googleanalytics.searchengines') ])
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
                    <th>Source</th>
                    <th>Pageviews</th>
                    <th>Session Duration</th>
                    <th>Exits</th>
                </tr>
                @foreach($analytics as $key => $item)
                <tr>
                    <td>{{ $item[0]  }}</td>
                    <td>{{ $item[1]  }}</td>
                    <td>{{ $item[2]  }}</td>
                    <td>{{ $item[3]  }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection