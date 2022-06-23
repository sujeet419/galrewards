<?php if(session()->get('language') == 'fr') { ?>	



<footer id="footer">
    <div class="wrap-footer-content footer-style-1">

        <div class="wrap-function-info">
            <div class="container">
                <ul>
                    <li class="fc-info-item">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Livraison gratuite</h4>
                            <p class="fc-desc">Commande gratuite</p>
                        </div>

                    </li>
              
                    <li class="fc-info-item">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Échanger des points</h4>
                            <p class="fc-desc">Échangez vos points à votre convenance</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Support en ligne</h4>
                            <p class="fc-desc">Collectez et suivez vos billets</p>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <!--End function info-->

        <div class="main-footer-content">

<div class="container">

    <div class="row">

    @php
                if(isset($data['userData'])){ 
                $data = session()->all(); 
                $allsesion= $data['userData'];
               $country_name= $allsesion['country_name']; 
              // dd($country_name);

     $getaddress = App\Models\country::where('country_name_en', $country_name)->first(); 
     //dd($getaddress['address_en']);
                }
        @endphp	

      

        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="wrap-footer-item">
                <h3 class="item-header">Contact Details</h3>
                <div class="item-content">

         

                    <div class="wrap-contact-detail">
                        <ul>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <a href="https://www.google.ca/maps/place/{{$getaddress['address_en'] ?? ''}}" target="_blank">
                                <p class="contact-txt">{{$getaddress['address_en'] ?? ''}}</p></a>
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <a href="tel:{{$getaddress['contact_no'] ?? ''}}">
                                <p class="contact-txt">{{$getaddress['contact_no'] ?? ''}}</p></a>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:{{$getaddress['email_address'] ?? ''}}">
                                <p class="contact-txt">{{$getaddress['email_address'] ?? ''}}</p></a>
                            </li>											
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        



                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                        <div class="wrap-footer-item">
                            <h3 class="item-header">Ligne directe</h3>
                            <div class="item-content">
                                <div class="wrap-hotline-footer">
                                    <span class="desc">Appelez-nous sans frais</span>
                                    <b class="phone-number">(+123) 456 789 - (+123) 666 888</b>
                                </div>
                            </div>
                        </div>

                    

                    </div>
					
				
					

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                        <div class="row">
                            <div class="wrap-footer-item twin-item">
                                <h3 class="item-header">Mon compte</h3>
                                <div class="item-content">
                                    <div class="wrap-vertical-nav">
                                        <ul>
										<?php $data = session()->all(); 
								if(isset($data['userdata'])){?>
							
										
                                            <li class="menu-item"><a href="{{route('account_details')}}" class="link-term">Mon profil</a></li>
                                            <li class="menu-item"><a href="{{route('orders')}}" class="link-term">Ordres</a></li>
                                            <li class="menu-item"><a href="{{route('ticket_status')}}" class="link-term">Mon billet</a></li>
											
									<?php } else{
								?>

                                           <li class="menu-item"><a href="{{route('flogin')}}" class="link-term">Mon profil</a></li>
                                            <li class="menu-item"><a href="{{route('flogin')}}" class="link-term">Ordres</a></li>
                                            <li class="menu-item"><a href="{{route('flogin')}}" class="link-term">Mon billet</a></li>


                             								
										<?php } ?>	
											
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-footer-item twin-item">
                                <h3 class="item-header">Informations</h3>
                                <div class="item-content">
                                    <div class="wrap-vertical-nav">
                                        <ul>
                                        <li class="menu-item"><a href="{{route('aboutus')}}" class="link-term">À propos de nous</a></li>
                                            <li class="menu-item"><a href="{{route('privacy_policy')}}" class="link-term">Politique de confidentialité</a></li>
                                            <li class="menu-item"><a href="{{route('return_policy')}}" class="link-term">Politique de retour</a></li>
                                     
    
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="wrap-footer-item">
                            <h3 class="item-header">RÉSEAU SOCIAL</h3>
                            <div class="item-content">
                                <div class="wrap-list-item social-network">
                                    <ul>


                                    <li><a href="https://www.facebook.com/TravelportCNWA" target="_blank" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.instagram.com/travelport_cnwa/" target="_blank" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.linkedin.com/company/travelport-cnwa" target="_blank" class="link-to-item" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.youtube.com/channel/UCnQMUGxz6TT37eK-bz2phVw?sub_confirmation=1" target="_blank" class="link-to-item" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                       

                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <!--   <div class="wrap-footer-item">
                            <h3 class="item-header">Télécharger l'application</h3>
                            <div class="item-content">
                                <div class="wrap-list-item apps-list">
                                    <ul>
                                        <li><a href="#" class="link-to-item" title="our application on apple store"><figure><img src="{{asset('frontend/assets/images/brands/apple-store.png')}}" alt="apple store" width="128" height="36"></figure></a></li>
                                        <li><a href="#" class="link-to-item" title="our application on google play store"><figure><img src="{{asset('frontend/assets/images/brands/google-play-store.png')}}" alt="google play store" width="128" height="36"></figure></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>

            

        </div>

        <div class="coppy-right-box">
            <div class="container">
                <div class="coppy-right-item item-left">
                    <p class="coppy-right-text">droits d'auteur © 2021 Galrewards. Tous les droits sont réservés</p>
                </div>
                <div class="coppy-right-item item-right">
                    <div class="wrap-nav horizontal-nav">
                        <ul>
                            <li class="menu-item"><a href="{{route('aboutus')}}" class="link-term">À propos de nous</a></li>								
                            <li class="menu-item"><a href="{{route('privacy_policy')}}" class="link-term">Politique de confidentialité</a></li>
                            <li class="menu-item"><a href="{{route('terms_conditions')}}" class="link-term">termes et conditions</a></li>
                            <li class="menu-item"><a href="{{route('return_policy')}}" class="link-term">Politique de retour</a></li>								
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</footer>

<?php }else{?>


<footer id="footer">
    <div class="wrap-footer-content footer-style-1">

        <div class="wrap-function-info">
            <div class="container">
                <ul>
                    <li class="fc-info-item">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Free Shipping</h4>
                            <p class="fc-desc">Free Order</p>
                        </div>

                    </li>
               
                    <li class="fc-info-item">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Redeem Points</h4>
                            <p class="fc-desc">Redeem points at your convenience</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Online Suport</h4>
                            <p class="fc-desc">Raise & Track your Tickets </p>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <!--End function info-->

        <div class="main-footer-content">

            <div class="container">

                <div class="row">

                @php
                            if(isset($data['userData'])){ 
                            $data = session()->all(); 
                            $allsesion= $data['userData'];
                           $country_name= $allsesion['country_name']; 
	
                 $getaddress = App\Models\country::where('country_name_en', $country_name)->first(); 
                 //dd($getaddress['address_en']);
                            }
                    @endphp	

                    <?php if(!empty($data['userData'])){ ?>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="wrap-footer-item">
                            <h3 class="item-header">Contact Details</h3>
                            <div class="item-content">

                     

                                <div class="wrap-contact-detail">
                                    <ul>
                                        <li>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <a href="https://www.google.ca/maps/place/{{$getaddress['address_en'] ?? ''}}" target="_blank">
                                            <p class="contact-txt">{{$getaddress['address_en'] ?? ''}}</p></a>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <a href="tel:{{$getaddress['contact_no'] ?? ''}}">
                                            <p class="contact-txt">{{$getaddress['contact_no'] ?? ''}}</p></a>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <a href="mailto:{{$getaddress['email_address'] ?? ''}}">
                                            <p class="contact-txt">{{$getaddress['email_address'] ?? ''}}</p></a>
                                        </li>											
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                        <div class="wrap-footer-item">
                            <h3 class="item-header">Hot Line</h3>
                            <div class="item-content">
                                <div class="wrap-hotline-footer">
                                    <span class="desc">Call Us toll Free</span>
                                    <b class="phone-number">(+123) 456 789 - (+123) 666 888</b>
                                </div>
                            </div>
                        </div>

                    

                    </div>
					
				
					

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                        <div class="row">
                            <div class="wrap-footer-item twin-item">
                                <h3 class="item-header">My Account</h3>
                                <div class="item-content">
                                    <div class="wrap-vertical-nav">
                                        <ul>
										<?php $data = session()->all(); 
								if(isset($data['userdata'])){?>
							
										
                                            <li class="menu-item"><a href="{{route('account_details')}}" class="link-term">My Account</a></li>
                                            <li class="menu-item"><a href="{{route('orders')}}" class="link-term">Orders</a></li>
                                            <li class="menu-item"><a href="{{route('ticket_status')}}" class="link-term">My Ticket</a></li>
											
									<?php } else{
								?>

                                           <li class="menu-item"><a href="{{route('flogin')}}" class="link-term">My Account</a></li>
                                            <li class="menu-item"><a href="{{route('flogin')}}" class="link-term">Orders</a></li>
                                            <li class="menu-item"><a href="{{route('flogin')}}" class="link-term">Ticket status</a></li>


                             								
										<?php } ?>	
											
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-footer-item twin-item">
                                <h3 class="item-header">Infomation</h3>
                                <div class="item-content">
                                    <div class="wrap-vertical-nav">
                                        <ul>
                                        <li class="menu-item"><a href="{{route('aboutus')}}" class="link-term">About Us</a></li>
                                            <li class="menu-item"><a href="{{route('privacy_policy')}}" class="link-term">Privacy Policy</a></li>
                                            <li class="menu-item"><a href="{{route('return_policy')}}" class="link-term">Return Policy</a></li>
                                     
    
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="wrap-footer-item">
                            <h3 class="item-header">Social network</h3>
                            <div class="item-content">
                                <div class="wrap-list-item social-network">
                                    <ul>
                                       
                                        <li><a href="https://www.facebook.com/TravelportCNWA" target="_blank" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.instagram.com/travelport_cnwa/" target="_blank" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.linkedin.com/company/travelport-cnwa" target="_blank" class="link-to-item" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="https://www.youtube.com/channel/UCnQMUGxz6TT37eK-bz2phVw?sub_confirmation=1" target="_blank" class="link-to-item" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                       
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                     <!--    <div class="wrap-footer-item">
                            <h3 class="item-header">Dowload App</h3>
                            <div class="item-content">
                                <div class="wrap-list-item apps-list">
                                    <ul>
                                        <li><a href="#" class="link-to-item" title="our application on apple store"><figure><img src="{{asset('frontend/assets/images/brands/apple-store.png')}}" alt="apple store" width="128" height="36"></figure></a></li>
                                        <li><a href="#" class="link-to-item" title="our application on google play store"><figure><img src="{{asset('frontend/assets/images/brands/google-play-store.png')}}" alt="google play store" width="128" height="36"></figure></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>

            

        </div>

        <div class="coppy-right-box">
            <div class="container">
                <div class="coppy-right-item item-left">
                    <p class="coppy-right-text">Copyright © 2021 Galrewards. All rights reserved</p>
                </div>
                <div class="coppy-right-item item-right">
                    <div class="wrap-nav horizontal-nav">
                        <ul>
                            <li class="menu-item"><a href="{{route('aboutus')}}" class="link-term">About us</a></li>								
                            <li class="menu-item"><a href="{{route('privacy_policy')}}" class="link-term">Privacy Policy</a></li>
                            <li class="menu-item"><a href="{{route('terms_conditions')}}" class="link-term">Terms & Conditions</a></li>
                            <li class="menu-item"><a href="{{route('return_policy')}}" class="link-term">Return Policy</a></li>								
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</footer>


<?php } ?>