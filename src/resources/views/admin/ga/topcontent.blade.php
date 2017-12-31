@extends('nuky::layouts.admin') @section('title') {{ trans('nuky::googleanalytics.topcontent') }} @endsection @section('content')
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
                                <th class="uk-table-shrink">Page</th>
								<th class="uk-table-shrink">Pageviews</th>
								<th class="uk-table-shrink">Unique Pageviews</th>
								<th class="uk-table-shrink">Time on Page</th>
								<th class="uk-table-shrink">Bounces</th>
								<th class="uk-table-shrink">Entrances</th>
								<th class="uk-table-shrink">Exits</th>
							</tr>
							@foreach($entries as $key => $item)
							<tr>
								<td  class="uk-text-truncate" title="{{ $item[0] }}" uk-tooltip="pos: bottom">{{ $item[0] }}</td>
								<td  class="uk-table-shrink">{{ $item[1] }}</td>
								<td  class="uk-table-shrink">{{ $item[2] }}</td>
								<td  class="uk-table-shrink">{{ $item[3] }}</td>
								<td  class="uk-table-shrink">{{ $item[4] }}</td>
								<td  class="uk-table-shrink">{{ $item[5] }}</td>
								<td  class="uk-table-shrink">{{ $item[6] }}</td>
							</tr>
							@endforeach
						</table>
					</div>

					{{ $entries->withPath('analytics-keywords')->links('nuky::admin.partials.pagination.default') }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection