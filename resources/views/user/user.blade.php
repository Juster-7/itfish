<x-main-layout>
	<x-slot name="title">Главная</x-slot>
	<x-slot name="description">descr</x-slot>
	<x-slot name="keywords">keyw</x-slot>
	<x-slot name="center">
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="section-row">
							@include('user.components.left')							
						</div>
					</div>
					<div class="col-md-8">
						<div class="section-row">
							<h3>Бонусы</h3>	
							@if($errors->any())
								@foreach ($errors->all() as $message)
									<span class="invalid-feedback error" role="alert">{{ $message }}</span><br>
								@endforeach
								<br>
							@endif
							
							@if(auth()->user()->isAdmin())
								<p>У пользователя <b>{{ $user->name }}</b> на счету бонусов: <b>{{ optional($user->bonus)->amount ?? 0 }}</b>.</p>
								<form method="POST" action="{{ route('user.bonusesWriteOff') }}">
									@csrf								
									<div class="row">
										<div class="col-md-7">
											<div class="form-group">
												<input id="amount" type="float" class="input form-control" name="amount" value="{{ old('amount') }}" required>
												<input id="user_id" type="hidden" name="user_id" value="{{ $user->id }}" required>
												<input id="amount_available" type="hidden" name="amount_available" value="{{ optional($user->bonus)->amount ?? 0 }}" required>
												<button type="submit" class="primary-button btn btn-primary">Списать</button>																					
											</div>
										</div>
									</div>
								</form>
								<br>
								<form method="POST" action="{{ route('user.bonusesAdd') }}">
									@csrf								
									<div class="row">
										<div class="col-md-7">
											<div class="form-group">
												<input id="amount" type="float" class="input form-control" name="amount" value="{{ old('amount') }}" required>
												<input id="user_id" type="hidden" name="user_id" value="{{ $user->id }}" required>
												<input id="amount_available" type="hidden" name="amount_available" value="{{ optional($user->bonus)->amount ?? 0 }}" required>
												<button type="submit" class="primary-button btn btn-primary">Зачислить</button>																					
											</div>
										</div>
									</div>
								</form>
								<a href="{{ route('user.index') }}"><-- Назад</a>
							@else
								<p>У Вас на счету бонусов: <b>{{ optional($user->bonus)->amount ?? 0 }}</b>.</p>
								<form method="POST" action="{{ route('user.bonusesWriteOff') }}">
								@csrf						
								<div class="row">
									<div class="col-md-7">
										<div class="form-group">
											<input id="amount" type="float" class="input form-control" name="amount" value="{{ old('amount') }}" required autofocus>
											<input id="user_id" type="hidden" name="user_id" value="{{ Auth()->user()->id }}" required>
											<input id="amount_available" type="hidden" name="amount_available" value="{{ optional($user->bonus)->amount ?? 0 }}" required>
											<button type="submit" class="primary-button btn btn-primary">Списать</button>																					
										</div>
									</div>
								</div>
							</form>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</x-slot>
</x-main-layout>