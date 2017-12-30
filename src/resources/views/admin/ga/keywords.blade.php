@extends('UIAdmin::layouts.admin') 

@section('title') 
Analytics 
@endsection 
@push('breadcrumb')
@include('UIAdmin::admin.partials.breadcrumb', ['link' => trans('UIAdmin::googleanalytics.keywords') ])
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
                    <th>Keyword</th>
                    <th>Sessions</th>
                </tr>
                @foreach($entries as $key => $item)
                <tr>
                    <td>{{ $item[0]  }}</td>
                    <td>{{ $item[1]  }}</td>
                </tr>
                @endforeach
            {{ $entries->withPath('analytics-keywords')->links('UIAdmin::admin.partials.pagination.default') }}
            </table>
        </div>
    </div>
</div>

@endsection




