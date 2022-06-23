@extends('admin.admin_master')
@section('admin')

<div class="content">						
    <div class="error-wrapper rounded border bg-white px-5">
    <div class="row justify-content-center">
        <div class="col-xl-4">
            <h1 class="text-primary bold error-title">404</h1>
            <p class="pt-4 pb-5 error-subtitle">Looks like something went wrong.</p>
            <a href="{{ route('dashboard')}}" class="btn btn-primary btn-pill">Back to Home</a>
        </div>
        <div class="col-xl-6 pt-5 pt-xl-0 text-center">
            <img src="{{ asset('assets/img/lightenning.png') }}" class="img-responsive" alt="Error Page Image">
        </div>
    </div>
</div>
</div>



@endsection