@extends('UIAdmin::layouts.admin') 

@section('title') 
Analytics 
@endsection 
@push('breadcrumb')
@include('UIAdmin::admin.partials.breadcrumb', ['link' => trans('UIAdmin::googleanalytics.returningsessions') ])
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
                    <th>Days</th>
                    <th>User Type</th>
                    <th>Sessions</th>
                </tr>
                @foreach($analytics as $key => $item)
                <tr>
                    <td >{{ $key  }}</td>
                    <td>New Visitor</td>
                    <td>{{ !empty($item[0]['visitors']) ? $item[0]['visitors'] : 0 }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection