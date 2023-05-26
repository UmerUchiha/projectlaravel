<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="/images/favicon.png" type="">
      <title>Famms - Fashion  Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('Home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{asset('Home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('Home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('Home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>

   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
        @include('Home.header');
         <!-- end header section -->
         <!-- slider section -->
         @include('Home.slider');
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('Home.why');
      
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('Home.arrival');
     
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('Home.product');
      
         <!-- end product section -->
         

      <!-- subscribe section -->
      @include('Home.subscribe');
      
      <!-- end subscribe section -->
      <!-- client section -->
      @include('Home.client');

          <!-- end client section -->
      <!-- footer start -->
      @include('Home.footer');
      
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>


      <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

      <!-- jQery -->
      <script src="Home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="Home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="Home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="Home/js/custom.js"></script>
   </body>
</html>