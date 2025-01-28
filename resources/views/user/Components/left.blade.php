<div class="post-author">
	<div class="media">
		<h3>{{ auth()->user()->name }}</h3>	
		<p>{{ auth()->user()->email }}</p>	
		<p>{{ auth()->user()->id }}</p>	
		<form action="{{ route('user.logout') }}" method="post">
			@csrf
			<button type="submit" class="primary-button btn btn-primary">{{ __('Logout') }}</button>
		</form>								
	</div>
</div>