@extends('frontend.master')

@section('indexhome')	


<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Forgot Password</span></li>
				</ul>
			</div>
			<div class="row">
			
			   @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif   
			
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
							       <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Enter your email address and we will send you a link to reset your password.</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email Address:</label>
										
									
									 <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
									
									
									</fieldset>
								
									
								      <input type="submit" value="Reset Password" class="btn btn-new btn-blue">
								
								
								
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->


@endsection