@extends('nuky::layouts.admin') 
@section('title') 
{{ trans('nuky::googleanalytics.keywords') }}
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
                                <th>Keyword</th>
                                <th>Sessions</th>
                            </tr>
                            @foreach($entries as $key => $item)
                            <tr>
                                <td>{{ $item[0]  }}</td>
                                <td>{{ $item[1]  }}</td>
                            </tr>
                            @endforeach
                        {{ $entries->withPath('analytics-keywords')->links('nuky::admin.partials.pagination.default') }}
                        </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection





