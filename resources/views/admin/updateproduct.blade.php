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
    }
    .input_type{
        color: black;
        width: 50%;
    }
    .imagestyle{
        color: white;
        padding: 2px;
    }
    .img-thumbnail{
        justify-content: center;
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
            <div class="centerd">
            @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{Session::get('success')}}
        </div>
        @endif
                <h2 class="fonth2">Update Product</h2>

                <form action="{{url('updateproduct',$productfind->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                 <input type="text" class="input_type" id="title" name="title" placeholder="Enter product title" value="{{$productfind->title}}"required=""><br>
                 <input type="text" class="input_type" id="description" name="description" placeholder="Enter product description" value="{{$productfind->description}}" required=""><br>
                 
                 

                 <input type="number" class="input_type" id="quantity" name="quantity" placeholder="Enter product quantity" value="{{$productfind->quantity}}" required=""><br>
                 <input type="number" class="input_type" id="price" name="price" placeholder="Enter product price" value="{{$productfind->price}}" required=""><br>
                 <input type="number" class="input_type" id="discount_price" name="discount_price" placeholder="Enter product discount_price"  value="{{$productfind->discount_price}}"required=""><br>


                 

                <label for="categories">Choose category:</label><br>
                
                <select class="form-select input_type" name="category">
                <option value="{{$productfind->category}}"></option>
                @foreach($Product as $pro)
                <option value="{{$pro->category_name}}">{{$pro->category_name}}</option>
                @endforeach
                </select>
                
                <h2 class="imagestyle">Current image</h2>
                <img src="/uploads/products/{{$productfind->image}}" width="50" height="50" name="image"class="img-thumbnail" >


                 <h2 class="imagestyle">choose image</h2>
                 <input type="file" class="input_type" id="image" name="image" placeholder="Enter product image" required=""><br>

                 
                 <button type="submit" class="btn btn-primary my-3">Submit</button><br>
                </div>
                </form>
            </div>

















            <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');

    <!-- End custom js for this page -->
  </body>
</html>