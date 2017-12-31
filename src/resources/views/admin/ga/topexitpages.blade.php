@extends('nuky::layouts.admin') @section('title') {{ trans('nuky::googleanalytics.topexitpages') }} @endsection @section('content')
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
					<div class="uk-overflow-auto">
						<table class="uk-table uk-table-divider">
                                <tr>
                                    <th style="width:40%">Exit Page</th>
                                    <th>Exits</th>
                                    <th>Pageviews</th>
                                </tr>
                                @foreach($entries as $key => $item)
                                <tr>
                                    <td style="word-wrap: break-word;">{{ $item[0]  }}</td>
                                    <td style="width:10%">{{ $item[1]  }}</td>
                                    <td style="width:10%">{{ $item[2]  }}</td>
                                </tr>
                                @endforeach
						</table>
					</div>
                    {{ $entries->withPath('analytics-top-exit-pages')->links('nuky::admin.partials.pagination.default') }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection