<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">


               <h2>
                  Our <span>products</span>
               </h2>
            </div>

            <style>
               .input_type{
               width: 30%;
               
               margin-left: 35%;
             }
            </style>

            <div class="search">
              <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="text" class="input_type" name="searchpro" placeholder="search for something">

                <input type="submit" value="search" class="btn btn-outline-primary">
              </form>
            </div>

            <div class="row">

   
            @foreach($product as $prod)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$prod->id)}}" class="option1">
                           product details
                           </a>
                     <form action="{{url('addcart',$prod->id)}}" method="post">      
                           
                        @csrf
                        <div class="row">

                        <div class="col-md-4">
                          <input type="number" name="quantity" value="1" min="1"style="width: 100px;">
                              
                        </div>


                        <div>
                           
                        </div class="col-md-4">
                           <input type="submit" value="add to Cart" class="option1">

                        </div>
                          
                           
                          

                          
                  </form>    
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/uploads/products/{{$prod->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$prod->title}}
                        </h5>

                        @if($prod->discount_price!=null)
                        <h6>
                        ${{$prod->discount_price}}
                        </h6>
                        
                        <h6 style="text-decoration:line-through">
                        ${{$prod->price}}
                        </h6>


                        @else

                        <h6>
                        ${{$prod->price}}
                        </h6>

                        @endif
                     </div>
                  </div>
               </div>
            @endforeach
            <br>
            {!!$product->appends(Request::all())->links()!!}
         </div>
      </section>
   