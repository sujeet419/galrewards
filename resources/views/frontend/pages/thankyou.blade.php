@extends('frontend.master')
@section('indexhome')	
<?php if(session()->get('language') == 'fr') { ?>
<!--main area-->
<main id="main" class="main-site">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{ route('frontend') }}" class="link">domicile</a></li>
            <li class="item-link"><span>Merci</span></li>
        </ul>
    </div>
</div>

<div class="container pb-60">

@if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif 
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Nous vous remercions de votre commande</h2>
            <p>Un e-mail de confirmation a été envoyé.</p>
            <a href="{{ route('shop') }}" class="btn btn-submit btn-submitx">Continuer vos achats</a>
        </div>
    </div>
</div><!--end container-->

</main>
<?php }else{?>

<main id="main" class="main-site">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Thank You</span></li>
        </ul>
    </div>
</div>

<div class="container pb-60">

@if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif 
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Thank you for your order</h2>
            <p>A confirmation email was sent.</p>
            <a href="{{ route('shop') }}" class="btn btn-submit btn-submitx">Continue Shopping</a>
        </div>
    </div>
</div><!--end container-->

</main>


<?php } ?>

@endsection