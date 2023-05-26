<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use App\Models\Category;

use RealRashid\SweetAlert\Facades\Alert;




class HomeController extends Controller
{
    public function redirect(){

        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
            $totalproduct = Product::all()->count();
            $totalorder = Order::all()->count();
            $totaluser = User::all()->count();
            $order = Order::all();
            

            $totalrevenue = 0;
            foreach($order as $ord){
                $totalrevenue = $totalrevenue+$ord->price;
            }

            $totaldelivered = Order::where('delivery_status','=','delivered')->get()->count();
            $totalprocessing= Order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home',compact('totalproduct','totalorder','totaluser','totalrevenue','totaldelivered','totalprocessing'));
        }
       
        else
        {
            $product = Product::paginate(3);
        return view('Home.userpage',compact('product'));
        }
    }


    public function index(){
        $product = Product::paginate(3);
        return view('Home.userpage',compact('product'));

    }

    public function product_details($id){
        $productdetail = Product::find($id);
        return view('Home.product_details',compact('productdetail'));
    }

    function addcart($id, Request $req){
            if(Auth::id()){
                $user = Auth::user();
                $userid  =$user->id;
                $product_exists = Cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();


                if($product_exists){


                    $cart = Cart::find($product_exists)->first();

                    $quantity = $cart->quantity;

                    $cart->quantity = $quantity+ $req->quantity;



                    
                      if($cart->discount_price!=null){
                    $cart->price = $cart->discount_price * $cart->quantity;

                     }else{
                      $cart->price = $cart->price * $cart->quantity;

                         }




                    $cart->save();

                    Alert::success('Product added successfully','We have added product to the cart');

                    return redirect()->back()->with('success','Product Successfully added');


                }

                else{

                    
                $productcart = Product::find($id);
                $cart = new Cart;

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                $cart->product_title = $productcart->title;


                if($productcart->discount_price!=null){
                    $cart->price = $productcart->discount_price * $productcart->quantity;

                }else{
                    $cart->price = $productcart->price * $productcart->quantity;

                }
                $cart->image = $productcart->image;
                $cart->product_id = $productcart->id;

                $cart->quantity = $req->quantity;

                $cart->save();
                return redirect()->back()->with('success','Product Successfully added');


                }

            }
            else{
                return redirect('login');
            }
    }


    public function showcart(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $cart = cart::where('user_id', '=',$id)->get();
            return view('Home.showcart', compact('cart'));
        }
        else{
            return redirect('login');
        }
       
    }

    public function deletecart(String $id){
        Cart::destroy($id);
        
        return redirect()->back();
    }

    public function cash_order(){
        $user = Auth::user();

        $userid = $user->id;

        $data = cart::where('user_id','=',$userid)->get();

        foreach($data as $datastore){
            $order = new Order;

            $order->name = $datastore->name;
            $order->email = $datastore->email;
            $order->phone = $datastore->phone;
            $order->address = $datastore->address;

            $order->user_id = $datastore->user_id;
            $order->product_title = $datastore->product_title;
            $order->price = $datastore->price;
            $order->quantity = $datastore->quantity;
            $order->image = $datastore->image;
            $order->product_id = $datastore->product_id;

            $order->delivery_status = 'processing';
            $order->payment_status = 'cash on delivery';

            $order->save();

            $cartid = $datastore->id;

            $cart = cart::find($cartid);

            $cart->delete();


        } 

        return redirect()->back()->with('message','we received your order we contact you shortly');
    }

    public function showorder(){
        if(Auth::id()){
            $id = Auth::user()->id;
            $order = Order::where('user_id', '=',$id)->get();
            return view('Home.showorder', compact('order'));
        }
        else{
            return redirect('login');
        }
    }


    public function deleteorder($id){
        $order = Order::find($id);
        $order->delivery_status = 'you cancelled order';
        $order->save();
        return redirect()->back();
    }

    public function searchpro(Request $req){

        
        $searchproduct = $req->searchpro;
        $product = Product::where('title','LIKE',"%$searchproduct%")->orWhere('category','LIKE',"%$searchproduct%")->paginate(3);
        return view('Home.userpage',compact('product'));
    }


    public function products(){
        $product = Product::paginate(3);
        return view('Home.Allproducts',compact('product'));
    }

    public function search_product(Request $req){
        $searchproduct = $req->searchpro;
        $product = Product::where('title','LIKE',"%$searchproduct%")->orWhere('category','LIKE',"%$searchproduct%")->paginate(3);
        return view('Home.Allproducts',compact('product'));
    }
    

}
