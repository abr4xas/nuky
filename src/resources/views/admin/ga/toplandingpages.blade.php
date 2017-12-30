@extends('UIAdmin::layouts.admin') 

@section('title') 
Analytics 
@endsection 
@push('breadcrumb')
@include('UIAdmin::admin.partials.breadcrumb', ['link' => trans('UIAdmin::googleanalytics.toplandingpages') ])
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
                    <th style="width:40%">Landing Page</th>
                    <th>Entrance</th>
                    <th>Bounce</th>
                </tr>
                @foreach($entries as $key => $item)
                <tr>
                    <td style="word-wrap: break-word;">{{ $item[0]  }}</td>
                    <td style="width:10%">{{ $item[1]  }}</td>
                    <td style="width:10%">{{ $item[2]  }}</td>
                </tr>
                @endforeach
                {{ $entries->withPath('analytics-top-landing-pages')->links('UIAdmin::admin.partials.pagination.default') }}
            </table>
        </div>
    </div>
</div>

@endsection




