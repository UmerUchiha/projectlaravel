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
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('Home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{asset('Home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('Home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('Home/css/responsive.css')}}" rel="stylesheet" />
      <style>
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 50px;
        }
        table{
            width: 100%;
        }
        #imgsize{
        width: 80px;
        height: 80px;
    }
      </style>

   </head>
   <body>



   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
        @include('Home.header');
         <!-- end header section -->
         <!-- slider section -->
       
         <!-- end slider section -->
      
      <!-- why section -->
    
      <div class="center">

      <table class="table">
  <thead>
    <tr>
      <th scope="col">Product title</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">image</th>
      <th scope="col">Action</th>



      
    </tr>
  </thead>
  <tbody>
        <?php $totalprice = 0;  ?>
        @foreach($cart as $cartstore)
    <tr>
        <td scope="row">{{$cartstore->product_title}}</td>
      <td scope="row">{{$cartstore->quantity}}</td>
      <td scope="row">{{$cartstore->price}}</td>
      <td><img src="/uploads/products/{{$cartstore->image}}" id="imgsize"></td>

      <td scope="row"><a href="{{url('deletecart',$cartstore->id)}}"onclick="confirmation(event)"class="btn btn-danger">Remove</a></td>

      <td scope="row">

      

    </tr>
   <?php $totalprice = $totalprice+ $cartstore->price ?>
        @endforeach

  </tbody>
</table>

    <div>
        <h1 class="total-deg">Total price : {{$totalprice}}</h1>
    </div>

    <div>
        <h1 style="font-size: 25px; padding-bottom:15px;">Proceed to Order</h1>

        <a href="{{url('cash_order')}}" class="btn btn-primary">Cash on Delivery</a>
        <a href="" class="btn btn-danger">Pay using card</a>

    </div>

    <div>
    @if(Session::has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{Session::get('message')}}
        </div>
        @endif    
    </div>


      </div>
      <!-- end why section -->
      
      <!-- arrival section -->
      
     
      <!-- end arrival section -->
      
      <!-- product section -->
     
      
         <!-- end product section -->

      <!-- subscribe section -->
      
      <!-- end subscribe section -->
      <!-- client section -->

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
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
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