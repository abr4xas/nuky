@extends('nuky::layouts.admin') 
@section('title') 
Analytics 
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
                            <th>Days</th>
                            <th>User Type</th>
                            <th>Sessions</th>
                        </tr>
                        @foreach($analytics as $key => $item)
                        <tr>
                            <td rowspan="2">{{ $key  }}</td>
                            <td>New Visitor</td>
                            <td>{{ !empty($item[0]['visitors']) ? $item[0]['visitors'] : 0 }}</td>
                        </tr>
                        <tr>
                            <td>Returning Visitor</td>
                            <td>{{ !empty($item[1]['visitors']) ? $item[1]['visitors'] : 0  }}</td>
                        </tr>
                        @endforeach
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection