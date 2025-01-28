<div id="nav">
	<div id="nav-fixed">
		<div class="container">
			<div class="nav-logo">
				<a href="{{ route('index') }}" class="logo">BONUS</a>
			</div>
			<div class="nav-btns">
				@guest
					<button class="aside-btn-login" title="Вход"><a href="{{ route('user.login') }}"><i class="fa fa-sign-in"></i></a></button>
					@if (Route::has('user.register'))
						<button class="aside-btn-register" title="Регистрация"><a href="{{ route('user.register') }}"><i class="fa fa-user-plus"></i></a></button>
					@endif
				@else
					<button class="aside-btn-user-main" title="Личный кабинет"><a href="{{ route('user.index') }}"><i class="fa fa-user"></i></a></button>
				@endif
				
			</div>
		</div>
	</div>
</div>