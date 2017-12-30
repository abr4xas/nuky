@extends('UIAdmin::layouts.admin') 

@section('title') 
Analytics 
@endsection 
@push('breadcrumb')
@include('UIAdmin::admin.partials.breadcrumb', ['link' => trans('UIAdmin::googleanalytics.topcontent') ])
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
                    <th style="width:40%">Page</th>
                    <th>Pageviews</th>
                    <th>Unique Pageviews</th>
                    <th>Time on Page</th>
                    <th>Bounces</th>
                    <th>Entrances</th>
                    <th>Exits</th>
                </tr>
                @foreach($entries as $key => $item)
                <tr>
                    <td style="word-wrap: break-word;">{{ $item[0]  }}</td>
                    <td style="width:10%">{{ $item[1]  }}</td>
                    <td style="width:10%">{{ $item[2]  }}</td>
                    <td style="width:10%">{{ $item[3]  }}</td>
                    <td style="width:10%">{{ $item[4]  }}</td>
                    <td style="width:10%">{{ $item[5]  }}</td>
                    <td style="width:10%">{{ $item[6]  }}</td>
                </tr>
                @endforeach
            {{ $entries->withPath('analytics-topcontent')->links('UIAdmin::admin.partials.pagination.default') }}
            </table>
        </div>
    </div>
</div>

@endsection




