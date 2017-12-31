<div class="uk-width-1-1@s">
	<div class="uk-card uk-card-default">
		<div class="uk-card-header">
			<div class="card-title">
				<div uk-grid>
					<div class="uk-width-2-3">
						<h5>Users & Pageviews</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-card-body">
			<table class="uk-table uk-table-divider">
				<tr>
					<th>Days</th>
					<th>No. of Users</th>
					<th>No. of Pageviews</th>
				</tr>
				@foreach ($gausers as $key => $item)
				<tr>
					<td>Last {{ $key }} days</td>
					<td>{{ !empty($item[0]['users']) ? $item[0]['users'] : 0 }}</td>
					<td>{{ !empty($item[0]['pageviews']) ? $item[0]['pageviews'] : 0 }}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>