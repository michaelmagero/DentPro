@extends('layouts.app')


@section('header')
    DMS LOGIN
@stop

@section('content')

	


    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
			<script src="../js/sweetalert2.all.js"></script>

			<!-- Include this after the sweet alert js file -->
			@if (Session::has('sweet_alert.alert'))
				<script>
					swal({!! Session::get('sweet_alert.alert') !!});
				</script>
			@endif
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="../admin/assets/app/media/img/logos/logo-1.png">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Sign In To Dashboard
								</h3>
							</div>
							<form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

								<div class="form-group">
									<input class="form-control form-control-lg m-input" type="email" placeholder="Email" name="email">
                                </div><br>
                                
								<div class="form-group">
									<input class="form-control form-control-lg m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                                </div>
                                
								<div class="m-login__form-action">
									<button id="m_login_signin_submit" type="submit" class="btn btn-focus m-btn  m-btn--custom   m-login__btn">
										Sign In
									</button>
								</div>
							</form>
						</div>
					</div>
                </div>
                
@endsection
