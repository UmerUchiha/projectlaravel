<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
        width: 50%;
    }
    .imagestyle{
        color: white;
        padding: 2px;
    }
    label{
      display: inline-block;
      width: 200px;
      font-size: large;
      font-style: bold;
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
            <h3 class="fonth2">Send Email to {{$orderemail->name}}</h3>

           <form action="{{url('sent_mail',$orderemail->id)}}" method="POST">
            @csrf
           <div style="padding-left: 35%; margin-top: 5%;">
                <label>Email greeting</label>
                <input type="text" name="greeting" class="input_type">
            </div>


            <div style="padding-left: 35%; margin-top: 5%;">
                <label>Email firstline</label>
                <input type="text" name="firstline" class="input_type">
            </div>

            <div style="padding-left: 35%; margin-top: 5%;">
                <label>Email Body</label>
                <input type="text" name="body" class="input_type">
            </div>

            <div style="padding-left: 35%; margin-top: 5%;">
                <label>Email Button</label>
                <input type="text" name="Button" class="input_type">
            </div>

            <div style="padding-left: 35%; margin-top: 5%;">
                <label>Email URL</label>
                <input type="text" name="url" class="input_type">
            </div>

            <div style="padding-left: 35%; margin-top: 5%;">
                <label>Email lastline</label>
                <input type="text" name="lastline" class="input_type">
            </div>

            <div style="padding-left: 35%; margin-top: 5%;">
                
                <input type="submit" value="Send Email" class="btn btn-info">
            </div>
           </form> 
          

            </div>    
        </div>
            <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script');

    <!-- End custom js for this page -->
  </body>
</html>