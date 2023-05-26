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
                <h2 class="fonth2">add Product</h2>

                <form action="{{url('/addProduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                 <input type="text" class="input_type" id="title" name="title" placeholder="Enter product title" required=""><br>
                 <input type="text" class="input_type" id="description" name="description" placeholder="Enter product description" required=""><br>
                 
                 

                 <input type="number" class="input_type" id="quantity" name="quantity" placeholder="Enter product quantity" required=""><br>
                 <input type="number" class="input_type" id="price" name="price" placeholder="Enter product price" required=""><br>
                 <input type="number" class="input_type" id="discount_price" name="discount_price" placeholder="Enter product discount_price" required=""><br>


                 


                <label for="categories">Choose category:</label><br>

                <select class="input_type" name="category">
                @foreach($Product as $cat) 
                
                <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                @endforeach
                </select>

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