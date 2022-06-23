@extends('frontend.master')
@section('indexhome')


<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">Home</a></li>
					<li class="item-link"><span>Reset Password</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
								
							<form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
								  @if(Session::has('message'))
            <div class="alert alert-success text-center" id="success-alert">
                {{Session::get('message')}}
            </div>
        @endif   


		<input type="hidden" name="token" value="{{ $token }}">


									<fieldset class="wrap-title">
										<h3 class="form-title">Reset your password</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email Address:</label>


										 <input type="text" id="email_address" class="form-control" name="email"  placeholder="Enter your email address" required autofocus>

                                  @if ($errors->has('email'))

                                      <span class="text-danger">{{ $errors->first('email') }}</span>

                                  @endif
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">New Password:</label>
										<input type="password" id="password" class="form-control" name="password" placeholder="Password" required autofocus>

@if ($errors->has('password'))

	<span class="text-danger">{{ $errors->first('password') }}</span>

@endif
							
							
							</fieldset>


							<fieldset class="wrap-input">
										<label for="frm-login-pass">Confirm Password:</label>
										
								 <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autofocus>

@if ($errors->has('password_confirmation'))

	<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>

@endif

							
							
							</fieldset>

									
							<input type="submit" value="Reset Password" class="btn btn-submit">	
								
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->
	
	
	 </div>



@endsection