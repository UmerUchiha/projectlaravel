<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use App\Notifications\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


use PDF;


class AdminController extends Controller
{
    
    public function category_view() {

        if(Auth::id()){
            $category = Category::all();
            return view('admin.category',compact('category'));
        }
        else{
            return redirect('login');
        }
        
        
    }

    public function add_category(Request $req){
        if(Auth::id()){
            $category = new Category;
            $category->category_name = $req->category_name;
            $category->save();
    
            return redirect()->back()->with('success','Successfully added');
        }
        else{
            return redirect('login');
        }
       
    }

    public function delete_category(String $id){
        if(Auth::id()){
            Category::destroy($id);
            return redirect()->back()->with('success','Successfully deleted');
        }

        else{
            return redirect('login');
        }
        

    }

    public function viewproduct(){

        if(Auth::id()){
            $Product = Category::all();
        return view('admin.Product',compact('Product'));
        }
        else{
            return redirect('login');
        }
        
    }

    public function addProduct(Request $req){

        if(Auth::id()){

            $Product = new Product;
            $Product->title = $req->title;
            $Product->description = $req->description;
            $Product->category = $req->category;
            $Product->quantity = $req->quantity;
            $Product->price = $req->price;
            $Product->discount_price = $req->discount_price;
    
    
    
            if($req->image){
                $ext = $req->image->getClientOriginalExtension();
                $newFilename = time().''.$ext;
                $req->image->move(public_path().'/uploads/products/',$newFilename);
                $Product->image = $newFilename;
                $Product->save();
            }
    
            
    
            return redirect()->back()->with('success','Successfully added');
        }

        else{
            return redirect('login');
        }
        
    }

    public function showproduct(){
        if(Auth::id()){
            $show_product = Product::all();
            return view('admin.showproduct',compact('show_product'));
        }

        else{
            return redirect('login');
        }
       
    }

    public function deleteproduct(String $id){
        if(Auth::id()){
            Product::destroy($id);
            return redirect()->back()->with('success','Successfully deleted');
        }
        else{
            return redirect('login');
        }
      
    }

    public function updateproduct($id){

        if(Auth::id()){
            $productfind = Product::find($id);
            $Product = Category::all();
    
            return view('admin.updateproduct',compact('productfind','Product'));
        }
        else{
            return redirect('login');
        }
        
    }

    public function edit($id,Request $req){
        if(Auth::id()){
            $Product = Product::find($id);
            $Product->title = $req->title;
            $Product->description = $req->description;
            $Product->category = $req->category;
            $Product->quantity = $req->quantity;
            $Product->price = $req->price;
            $Product->discount_price = $req->discount_price;
    
    
    
            if($req->image){
                $ext = $req->image->getClientOriginalExtension();
                $newFilename = time().''.$ext;
                $req->image->move(public_path().'/uploads/products/',$newFilename);
                $Product->image = $newFilename;
                $Product->save();
            }
    
            
    
            return redirect()->back()->with('success','Successfully updated');


        }else{

            return redirect('login');
        }
        
    }

    function Order(){
        if(Auth::id()){
            $order = Order::all();
            return view('admin.order',compact('order'));
        }else{
            return redirect('login');
        }
        
    }

    function delivered($id){
        if(Auth::id()){
            $orderdata = Order::find($id);

            $orderdata->delivery_status = 'delivered';
    
            $orderdata->payment_status = 'Paid';
    
    
            $orderdata->save();
    
            return redirect()->back();
        }else{
            return redirect('login');
        }
      
    }

   function send_email($id){
    if(Auth::id()){
        $orderemail = Order::find($id);
        return view('admin.email_info',compact('orderemail'));
    }else{
        return redirect('login');
    }
   
   }

   function sent_mail($id,Request $req){
    if(Auth::id()){
        $ordersend = Order::find($id);

        $details = [
            'greeting'=>$req->greeting,
            'firstline'=>$req->firstline,
            'body'=>$req->body,
            'Button'=>$req->Button,
            'url'=>$req->url,
            'lastline'=>$req->lastline,

        ];

        Notification::send($ordersend, new SendEmail($details));
        return redirect()->back();
    }else{
        return redirect('login');
    }
      
   }

   public function search(Request $req){
    if(Auth::id()){
        $searchproduct = $req->search;
        $order = order::where('name','LIKE',"%$searchproduct%")->orwhere('phone','LIKE',"%$searchproduct%")->orwhere('product_title','LIKE',"%$searchproduct%")->get();

        return view('admin.order',compact('order'));

    }else{
        return redirect('login');
    }
      
   }

   public function dashboard(){
    if(Auth::id()){
        return view('admin.dashboard');
    }else{
        return redirect('login');
    }
    
   }

}
