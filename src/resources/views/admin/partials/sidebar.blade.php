<div class="uk-width-1-1@m uk-width-1-3@l uk-width-1-4@xl">
	<div class="uk-card uk-card-default">
		<div class="uk-card-header input-header">
			<div class="card-title">
				<div uk-grid>
					<div class="uk-width-2-3">
						<form method="POST">
							<input class="uk-input invisible-input uk-form-large small-text-large-input" placeholder="Search in the site...">
						</form>
					</div>
					<div class="uk-width-1-3 uk-text-right" style="padding-top: 13px;">
						<div uk-spinner></div>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-card-body uk-text-center">
			<img class="user-avatar" src="{{ Gravatar::get(Auth::user()->email) }}" alt="">
			<span class="user-name">{{ Auth::user()->name }}</span>
			{{--
			<span class="user-sub">
				<span class="mdi mdi-checkbox-blank-circle uk-text-success"></span>
			</span> --}}
		</div>
	</div>
	<br />
	<div class="uk-card uk-card-default">
		<div class="uk-card-header">
			<div class="card-title">Main Menu</div>
		</div>
		<div class="uk-card-body">
			<ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
				<li class="active">
					<a href="#">Dashboard</a>
				</li>
				<li>
					<a href="#">UI Elements</a>
				</li>
				<li>
					<a href="#">Widgets</a>
				</li>
				<li>
					<a href="#">Login Page</a>
				</li>
				<li>
					<a href="#">Register Page</a>
				</li>
				<li class="uk-parent">
					<a href="#">Parent</a>
					<ul class="uk-nav-sub">
						<li>
							<a href="#">Sub item</a>
						</li>
						<li>
							<a href="#">Sub item</a>
						</li>
					</ul>
				</li>
				@if(env('ANALYTICS_VIEW_ID'))
				<li class="uk-parent">
					<a href="#">Google Analytics</a>
					<ul class="uk-nav-sub">
						@include('nuky::admin.partials.ga-menu')
					</ul>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>