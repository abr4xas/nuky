@extends('UIAdmin::layouts.admin') 

@section('title') 
Analytics 
@endsection 
@push('breadcrumb')
@include('UIAdmin::admin.partials.breadcrumb', ['link' => trans('UIAdmin::googleanalytics.timeonsite') ])
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
                    <th>Sessions</th>
                    <th>Session Duration (sec)</th>
                    <th>Average (sec/session)</th>
                </tr>
                @foreach($analytics as $key => $item)
                <tr>
                    <td>{{ $item[0]  }}</td>
                    <td>{{ $item[1]  }}</td>
                    <td>{{ round($item[1]/$item[0])  }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection