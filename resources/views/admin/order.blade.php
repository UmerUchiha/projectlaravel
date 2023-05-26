<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css');

    <style>
    .centerd{
            text-align: center;
            padding-top: 40px;
    }
    .fonth2{
        font-size: 40px;
        padding-bottom: 40px;
        text-align: center;
    }
    .input_type{
        color: black;
    }
    .search{
      text-align: center;
      margin-bottom: 30px;
    }
    </style>
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar');
      <!-- partial -->
      @include('admin.header');
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
            <h3 class="fonth2">All Orders</h3>

            <div class="search">
              <form action="{{url('search')}}" method="get">
                @csrf
                <input type="text" class="input_type" name="search" placeholder="search">

                <input type="submit" value="search" class="btn btn-outline-primary">
              </form>
            </div>


<div class="table-responsive">
    

            <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Price</th>
      <th scope="col">Product title</th>
      <th scope="col">Quantity</th>
      <th scope="col">Delivery</th>
      <th scope="col">Payment</th>

      <th scope="col">Image</th>
      <th scope="col">Delivered</th>
      <th scope="col">Send email</th>


    </tr>
  </thead>
  <tbody>
        @forelse($order as $orders)
    <tr>
        <td scope="row">{{$orders->name}}</td>
      <td scope="row">{{$orders->email}}</td>
      <td scope="row">{{$orders->address}}</td>
      <td scope="row">{{$orders->phone}}</td>
      <td scope="row">{{$orders->price}}</td>
      <td scope="row">{{$orders->product_title}}</td>
      <td scope="row">{{$orders->quantity}}</td>
      <td scope="row">{{$orders->delivery_status}}</td>
      <td scope="row">{{$orders->payment_status}}</td>

      <td scope="row">

        <img src="/uploads/products/{{$orders->image}}" id="imgsize">
        </td>


        @if($orders->delivery_status=='processing')
        <td scope="row">

        <a href="{{url('delivered',$orders->id)}}" onclick="return confirm('Are you sure you want to deliver?')"class="btn btn-primary" >Delivered</a>
        
        </td>  

        @else
        <td scope="row">Delivered</td>


        @endif

        <td>
            <a href="{{url('email',$orders->id)}}" class="btn btn-info">Send email </a>
        </td>

        @empty
          <tr>

            <td colspan="16">
              no data found
            </td>
          </tr>

      @endforelse

    </tr>
    

  </tbody>
</table>

</div>         

            </div>
        </div>
            <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');

    <!-- End custom js for this page -->
  </body>
</html>