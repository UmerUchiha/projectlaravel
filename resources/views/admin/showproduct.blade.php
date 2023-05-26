<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css');


    <style>
    .centerd{
            text-align: center;
            padding-top: 30px;
    }
    .fonth2{
        font-size: 30px;
        padding-bottom: 40px;
    }
    .input_type{
        color: black;
        width: 50%;
    }
    .imagestyle{
        color: white;
        padding: 2px;
    }
    #imgsize{
        width: 80px;
        height: 80px;
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
        @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{Session::get('success')}}
        </div>
        @endif  
            <div class="centerd">

            <h3 class="fonth2">show product</h3>

           
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Product title</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Discount price</th>
      <th scope="col">Product image</th>
      <th scope="col">delete</th>
      <th scope="col">Update</th>



      
    </tr>
  </thead>
  <tbody>
        @foreach($show_product as $pro)
    <tr>
        <td scope="row">{{$pro->title}}</td>
      <td scope="row">{{$pro->description}}</td>
      <td scope="row">{{$pro->quantity}}</td>
      <td scope="row">{{$pro->category}}</td>
      <td scope="row">{{$pro->price}}</td>
      <td scope="row">{{$pro->discount_price}}</td>
      <td scope="row">

        <img src="/uploads/products/{{$pro->image}}" id="imgsize">
      </td>
      <td><a href="{{url('/deleteproduct',$pro->id)}}"class="btn btn-danger">Delete</a></td>
      <td><a href="{{url('/updateproduct',$pro->id)}}"class="btn btn-primary">Update</a></td>

    </tr>
    @endforeach


  </tbody>
</table>

            




            <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');

    <!-- End custom js for this page -->
  </body>
</html>