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
							<table>
							@foreach($users as $user)
								<tr>
									<td>
										<a href="{{ route('user.user', $user) }}">{{ $user->name }} </a>
									</td>
									<td>
										{{ optional($user->bonus)->amount ?? 0 }}
									</td>
								</tr>
							@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</x-slot>
</x-main-layout>