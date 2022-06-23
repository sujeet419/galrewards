@extends('frontend.master')
@section('indexhome')	



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<!--main area-->

	<?php if(session()->get('language') == 'fr') { ?>	


	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">domicile</a></li>
					<li class="item-link"><span>connexion</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
								
								  <form action="{{ route('user_login') }}" method="POST" id="loginForm">
                          @csrf
								  @if(Session::has('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{Session::get('success')}}
            </div>
        @endif   
									<fieldset class="wrap-title">
										<h3 class="form-title">Connectez-vous à votre compte</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Adresse e-mail:</label>
										<input type="text" id="frm-login-uname" name="email" required placeholder="Saisissez votre adresse e-mail">
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Mot de passe:</label>
										<input type="password" id="id_password" name="password" required placeholder="Mot de passe" autocomplete="off">
								<i class="far fa-eye" id="togglePassword" style="margin-left: -30px; margin-top:15px; cursor: pointer; position:absolute;"></i>
									</fieldset>
									
									<fieldset class="wrap-input">
										<label class="remember-field">
											<input class="frm-input " name="rememberme" id="rememberme" value="forever" type="checkbox"><span>Souviens-toi de moi</span>
										</label>
										<a class="link-function left-position" href="{{ route('forget.password.get') }}" title="Forgotten password?">Mot de passe oublié?</a>
									</fieldset>
									<input type="submit" class="btn btn-submit" value="Connexion" name="submit">
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

	 <?php }else{?>


		<main id="main" class="main-site left-sidebar">

<div class="container">

	<div class="wrap-breadcrumb">
		<ul>
			<li class="item-link"><a href="#" class="link">home</a></li>
			<li class="item-link"><span>login</span></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
			<div class=" main-content-area">
				<div class="wrap-login-item ">						
					<div class="login-form form-item form-stl">
						
						  <form action="{{ route('user_login') }}" method="POST" id="loginForm">
				  @csrf
						  @if(Session::has('success'))
	<div class="alert alert-success text-center" id="success-alert">
		{{Session::get('success')}}
	</div>
@endif   
							<fieldset class="wrap-title">
								<h3 class="form-title">Log in to your account</h3>										
							</fieldset>
							<fieldset class="wrap-input">
								<label for="frm-login-uname">Email Address:</label>
								<input type="text" id="frm-login-uname" name="email" required placeholder="Type your email address">
							</fieldset>
							<fieldset class="wrap-input">
								<label for="frm-login-pass">Password:</label>
								<input type="password" id="id_password" name="password" required placeholder="password" autocomplete="off">
						<i class="far fa-eye" id="togglePassword" style="margin-left: -30px; margin-top:15px; cursor: pointer; position:absolute;"></i>
							</fieldset>
							
							<fieldset class="wrap-input">
								<label class="remember-field">
									<input class="frm-input " name="rememberme" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
								</label>
								<a class="link-function left-position" href="{{ route('forget.password.get') }}" title="Forgotten password?">Forgot password?</a>
							</fieldset>
							<input type="submit" class="btn btn-submit" value="Login" name="submit">
						</form>
					</div>												
				</div>
			</div><!--end main products area-->		
		</div>
	</div><!--end row-->

</div><!--end container-->

</main>
<!--main area-->
		



	<?php } ?>





	 <script>

			const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});	

</script>
	 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 <script>
    $(document).ready(function(){
  
      $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});



    });
	

	
</script>






	@endsection