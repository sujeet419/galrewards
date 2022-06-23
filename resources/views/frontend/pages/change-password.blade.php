@extends('frontend.master')
@section('indexhome')	


<style>

.Short {  
    width: 100%;  
    background-color: #dc3545;  
    margin-top: 5px;  
    height: 3px;  
    color: #dc3545;  
    font-weight: 500;  
    font-size: 12px;  
}
</style>
	<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Change Password</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
								
								  <form action="{{ route('update_password') }}" method="POST">
                          @csrf
								
									<fieldset class="wrap-title">
										<h3 class="form-title">First time user login need to change password</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email Address:</label>
					<input type="text" value="{{$email}}" id="frm-login-uname" style="background-color: antiquewhite;" name="email" readonly>
									</fieldset>
									
								

									<fieldset class="wrap-input">
										<label for="frm-login-pass">Change Password:</label>
										<input type="password" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers"  id="txtPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="password" placeholder="Change Password">
										<div id="strengthMessage"></div>
									</fieldset>


									<fieldset class="wrap-input">
										<label for="txtConfirmPassword">Reconfirm Password:</label>
										<input type="password" id="txtConfirmPassword" name="reconfirm_password" placeholder="Reconfirm Password" oninput="check(this)">
									</fieldset>
									
									
									<input type="submit" class="btn btn-submit" value="Change Password" name="submit">
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->

	
<!-- <script>

$(document).ready(function () {  
    $('#txtPassword').keyup(function () {  
		
        $('#strengthMessage').html(checkStrength($('#txtPassword').val()))  
    })  
    function checkStrength(password) {  
        var strength = 0  
        if (password.length < 6) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Short')  
            return 'Too short'  
        }  
        if (password.length > 7) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  

        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Weak')  
            return 'Weak Password'  
        } else if (strength == 2) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Good')  
            return 'Good'  
        } else {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Strong')  
            return 'Strong'  
        }  
    }  
});  


</script>
 -->



	 <script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('txtPassword').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script> 

	@endsection