@extends('admin.admin_master')
@section('admin')

<div class="content">							<div class="breadcrumb-wrapper">
    <h1>Admin Profile</h1>
    
<nav aria-label="breadcrumb">
<ol class="breadcrumb p-0">
<li class="breadcrumb-item">
<a href="{{ route('dashboard')}}">
<span class="mdi mdi-home"></span>                
</a>
</li>
<li class="breadcrumb-item">
components
</li>
<li class="breadcrumb-item" aria-current="page">Admin Profile</li>
</ol>
</nav>

</div>

<div class="row no-gutters">
    <div class="col-lg-6 col-xl6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            <h3> Admin Details</h3>
            </div>
            <div class="card-body">
{{-- <form action="{{route('user.profile.update')}}" method="post" class="form-horizontal" id="changeUsernameForm">
@csrf --}}
                <div class="form-group">
                    <label for="exampleInputPassword1">Admin Name :</label>
                    <input type="test" class="form-control" value="{{$user->name}}" placeholder="Name" name="name" readonly>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Admin E-Mail :</label>
                    <input type="test" class="form-control" value="{{$user->email}}" placeholder="Email" name="email" readonly>
                </div>
                {{-- <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button> --}}
{{-- </form> --}}
            </div>
        </div>
        
    </div>

    <div class="col-lg-6 col-xl6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
            <h3>    Change Admin Password</h3>
            </div>
            <div class="card-body">
                <form action="{{route('store.user.password')}}" method="post" class="form-horizontal" id="changePasswordForm">
					@csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Current Password :</label>
                    <input type="password" class="form-control" id="password" name="oldpassword" placeholder="Current Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">New Password :</label>
                    <input type="password" class="form-control" id="npassword" name="password" placeholder="New Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password :</label>
                    <input type="password" class="form-control" id="cpassword" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
</form>
            </div>
        </div>
        
    </div>
</div>
						
</div>

@endsection