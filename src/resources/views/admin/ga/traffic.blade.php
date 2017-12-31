@extends('nuky::layouts.admin') 
@section('title') 
{{ trans('nuky::googleanalytics.trafficsources') }}
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
                                <th>Source</th>
                                <th>Medium</th>
                                <th>Sessions</th>
                                <th>Pageviews</th>
                                <th>Sessions Duration</th>
                                <th>Exits</th>
                            </tr>
                            @foreach($analytics as $key => $item)
                            <tr>
                                <td>{{ $item[0]  }}</td>
                                <td>{{ $item[1]  }}</td>
                                <td>{{ $item[2]  }}</td>
                                <td>{{ $item[3]  }}</td>
                                <td>{{ $item[4]  }}</td>
                                <td>{{ $item[5]  }}</td>
                            </tr>
                            @endforeach
                        </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
