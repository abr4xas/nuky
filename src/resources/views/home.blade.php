@extends('nuky::layouts.admin') 
@section('title') 
Home 
@endsection 
@section('content')
<div class="uk-width-1-1@m uk-width-2-3@l uk-width-3-4@xl">
	<div uk-grid class="uk-grid-small">
		<div class="uk-width-1-1@s uk-width-1-2@l uk-width-1-4@xl">
			<div class="uk-card uk-card-default">
				<div class="uk-card-body uk-text-center">
					<span class="statistic">6.148,03 &euro;</span>
					<span class="statistic-title">Current month profit</span>
				</div>
			</div>
		</div>
		<div class="uk-width-1-1@s uk-width-1-2@l uk-width-1-4@xl">
			<div class="uk-card uk-card-default">
				<div class="uk-card-body uk-text-center">
					<span class="statistic">383</span>
					<span class="statistic-title">Current month sales</span>
				</div>
			</div>
		</div>
		<div class="uk-width-1-1@s uk-width-1-2@l uk-width-1-4@xl">
			<div class="uk-card uk-card-default">
				<div class="uk-card-body uk-text-center">
					<span class="statistic">3.215,29 &euro;</span>
					<span class="statistic-title">Last Month profit</span>
				</div>
			</div>
		</div>
		<div class="uk-width-1-1@s uk-width-1-2@l uk-width-1-4@xl">
			<div class="uk-card uk-card-default">
				<div class="uk-card-body uk-text-center">
					<span class="statistic">194</span>
					<span class="statistic-title">Last month sales</span>
				</div>
			</div>
		</div>
		<div class="uk-width-1-1@s">
			<div class="uk-card uk-card-default">
				<div class="uk-card-body">
					<div id="chart1" style="height: 400px"></div>
				</div>
			</div>
		</div>
		<div class="uk-width-1-1@s">
			<div class="uk-card uk-card-default">
				<div class="uk-card-header input-header">
					<div class="card-title">
						<div uk-grid>
							<div class="uk-width-2-3 input-header-padder">
								Latest transactions
							</div>
							<div class="uk-width-1-3">
								<form method="POST">
									<input class="uk-input invisible-input uk-form-large small-text-large-input" placeholder="Search by number...">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="uk-card-body">
					<table class="uk-table">
						<thead>
							<tr>
								<th>Transaction number</th>
								<th>Transaction Ammount</th>
								<th>Transaction Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>#51541</td>
								<td>712,24 &euro;</td>
								<td>
									<span class="uk-label uk-label-warning">In proccess</span>
								</td>
							</tr>
							<tr>
								<td>#72260</td>
								<td>274,31 &euro;</td>
								<td>
									<span class="uk-label uk-label-success">Paid</span>
								</td>
							</tr>
							<tr>
								<td>#25192</td>
								<td>424,72 &euro;</td>
								<td>
									<span class="uk-label uk-label-success">Paid</span>
								</td>
							</tr>
							<tr>
								<td>#71233</td>
								<td>92,31 &euro;</td>
								<td>
									<span class="uk-label uk-label-danger">Failed</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
	google.charts.load('current', {
		'packages': ['bar']
	});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
		var data = google.visualization.arrayToDataTable([
			['Year', 'Sales', 'Expenses', 'Profit'],
			['2014', 1000, 400, 200],
			['2015', 1170, 460, 250],
			['2016', 660, 1120, 300],
			['2017', 1030, 540, 350]
		]);

		var options = {
			chart: {
				title: 'Company Performance',
				subtitle: 'Sales, Expenses, and Profit: 2014-2017',
			},
			colors: ['#3F51B5', '#F44336', '#FFEB3B'],
		};

		var chart = new google.charts.Bar(document.getElementById('chart1'));

		chart.draw(data, google.charts.Bar.convertOptions(options));
	}

</script>
@endpush