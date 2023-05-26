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
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar');
      <!-- partial -->
      @include('admin.header');

     

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="centerd">
            @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{Session::get('success')}}
        </div>
        @endif
                <h2 class="fonth2">add category</h2>

                <form action="{{url('/add_category')}}" method="POST">
                @csrf
                <div class="mb-3">
                 <input type="text" class="input_type" id="category_name" name="category_name" placeholder="Enter product name">
                 <button type="submit" class="btn btn-primary my-3">Submit</button>
                </div>
                </form>
            </div>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Category_Name</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($category as $cat)

    <tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->category_name}}</td>
      <td><a onclick="return confirm('Are you sure to delete this ?')"href="{{url('/delete_category',$cat->id)}}"class="btn btn-danger">Delete</a></td>
    </tr>
    
@endforeach

  </tbody>
</table>
        </div>
    </div>

   
      
    @include('admin.script');

    <!-- End custom js for this page -->
  </body>
</html>