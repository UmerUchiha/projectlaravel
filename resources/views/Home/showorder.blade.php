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
      <th scope="col">Payment Status</th>
      <th scope="col">Delivery Status</th>
      <th scope="col">image</th>
      <th scope="col">Action</th>



      
    </tr>
  </thead>
  <tbody>
        <?php $totalprice = 0;  ?>
        @foreach($order as $orderstore)
    <tr>
        <td scope="row">{{$orderstore->product_title}}</td>
      <td scope="row">{{$orderstore->quantity}}</td>
      <td scope="row">{{$orderstore->price}}</td>
      <td scope="row">{{$orderstore->payment_status}}</td>
      <td scope="row">{{$orderstore->delivery_status}}</td>
      

      <td><img src="/uploads/products/{{$orderstore->image}}" id="imgsize"></td>

      <td scope="row">
        @if($orderstore->delivery_status == 'processing')

      
            <a href="{{url('deleteorder',$orderstore->id)}}"class="btn btn-danger">Cancel Order</a>
        
            @else
        <td scope="row">Not Allowed</td>
        @endif
        
        
        </td>

       
      
    
      

    </tr>
   <?php $totalprice = $totalprice+ $orderstore->price ?>
        @endforeach

  </tbody>
</table>

    <div>
        <h1 class="total-deg">Total price : {{$totalprice}}</h1>
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