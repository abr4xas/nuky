@extends('nuky::layouts.admin') 
@section('title') 
{{ trans('nuky::googleanalytics.operatingsystem') }}
@endsection 
@section('content')
<div class="uk-width-1-1@m uk-width-2-3@l uk-width-3-4@xl">
	<div uk-grid class="uk-grid-small">
		<div class="uk-width-1-1@s">
			<div class="uk-card uk-card-default">
				<div class="uk-card-header">
					<div class="card-title">
						<div uk-grid>
							<div class="uk-width-6">
								<h5>
									{{ $description }}
								</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="uk-card-body">
                    <table class="uk-table uk-table-divider">
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
                        {{ $entries->withPath('analytics-operating')->links('nuky::admin.partials.pagination.default') }}
                        </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
