<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{__('index.dir')}}">
  <head>
    <title>{{__('index.jobfinder')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    
    
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
  
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @if(app()->getLocale() === 'ar')
    <link rel="stylesheet" href="{{asset('css/rtl.css')}}">
    @endif
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="{{url('')}}">Job<strong class="font-weight-bold">Finder</strong> </a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                    @auth
                      @foreach($pages as $page)
                          @if($page->name === 'categories')
                            <li class="has-children">
                              <a href="{{url($page->name)}}">{{ucfirst(__('index.'.$page->name))}}</a>
                              <ul class='dropdown arrow-top'>
                                @foreach($categories as $category)
                                  <li>
                                    <a href="{{url($category->name)}}">{{ucfirst(__('index.'.$category->name))}}</a>
                                  </li>
                                @endforeach
                              </ul>
                            </li>
                          @elseif($page->name === 'register')
                            <li>{{__('index.welcom')}} {{ucfirst(auth()->user()->name)}}</li>
                          @elseif($page->name === 'login')
                            <li class="has-children">
                                <a href ="#">{{__('index.my account')}}</a>
                                <ul class='dropdown'> 
                                  <li>
                                    @php
                                      $link = "dashboard/profile/".auth()->user()->id
                                    @endphp
                                      <a href="{{url($link)}}">{{ucfirst(__('index.my profile'))}}</a> 
                                    </li>
                                    <li>
                                      <a href="{{url('dashboard/'.auth()->user()->id)}}">{{ucfirst(__('index.my dashboard'))}}</a>
                                    </li>
                                    <li>
                                      <a href="#" onclick="document.getElementById('form-logout').submit();">{{ucfirst(__('index.logout'))}}</a>
                                      <form action="{{url('logout')}}" method='POST' id='form-logout'>{{csrf_field()}}</form>
                                    </li>
                                  </ul> 
                              </li>
                          @else
                              <li>
                                <a href="{{url( ($page->name == 'home')? '/' : $page->name  )}}">{{__('index.'.$page->name)}}</a>
                              </li>
                          @endif
                      @endforeach
                    <li class="has-children">
                      <a href="#">{{ucfirst(app()->getLocale())}}</a>
                      <ul class='dropdown'>
                      @if(app()->getLocale() === 'en')
                        <li><a href="{{url('lang/ar')}}">AR</a></li>
                      @else
                        <li><a href="{{url('lang/en')}}">EN</a></li>
                      @endif
                      </ul>
                    </li>
  
                    @endauth

                    @guest
                        @foreach($pages as $page)
                          @if($page->name === 'categories')
                            <li class="has-children">
                              <a href="{{url($page->name)}}">{{$page->name}}</a>
                              <ul class='dropdown arrow-top'>
                                @foreach($categories as $category)
                                  <li>
                                    <a href="{{url($category->name)}}">{{ucwords($category->name)}}</a>
                                  </li>
                                @endforeach
                              </ul>
                            </li>
                          @else
                            <li>
                              <a href="{{url( ($page->name == 'home')? '/' : $page->name  )}}">{{$page->name}}</a>
                            </li>
                          @endif
                        @endforeach
                            <li class="has-children">
                              <a href="#">{{ucfirst(app()->getLocale())}}</a>
                                <ul class='dropdown arrow-top'>
                                @if(app()->getLocale() === 'ar')
                                  <li><a href="{{url('lang/en')}}">EN</a></li>
                                @else
                                  <li><a href="{{url('lang/ar')}}">AR</a></li>
                                @endif
                                </ul>
                            </li>
                    @endguest                    
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @yield('content')

    <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">{{ucfirst(__('index.about us'))}}</h3>
            <p>{{$about_us->content}}</p>
            <p><a href="{{url('/about')}}" class="btn btn-primary pill text-white px-4">Read More</a></p>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                  @foreach($pages as $page)
                  <li><a href="{{url($page->name)}}">{{ucfirst($page->name)}}</a></li>
                  @endforeach
                  </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Categories</h3>
                  <ul class="list-unstyled">
                  @foreach($categories as $category)
                    <li><a href="{{url($category->name)}}">{{ucwords($category->name)}}</a></li>
                  @endforeach
                  </ul>
              </div>
            </div>
          </div>

          
          <div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
               <p>
              
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>
              
                </p>                
              </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="icon-heart text-warning" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>
  
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>

  
  <script src="{{asset('js/mediaelement-and-player.min.js')}}"></script>

  <script src="{{asset('js/main.js')}}"></script>
    

  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>


    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete"
        async defer></script>

  </body>
</html>