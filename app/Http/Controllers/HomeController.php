<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;

class HomeController extends Controller
{

    public function index()
    {
        $product=Product::paginate(3);
        return view('home.userpage', compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
            $product=Product::paginate(3);
        return view('home.userpage', compact('product'));
        }
    }
    public function product_details($id)
    {
        $product=Product::find($id);
        return view('home.product_details', compact('product'));
    }
    public function add_cart( Request $request , $id)
    {
       if(Auth::id())
       {
          $user=Auth::user();
            $product=Product::find($id);
            $cart=new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            if($product->discount_price!=NULL)
            { 
                $cart->price=$product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price=$product->price * $request->quantity;
            }
            $cart->quantity=$request->quantity;
            
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->user_id=$user->id;
            $cart->save();
            return redirect()->back()->with('success', 'Product added to cart successfully');
       }
         else
         {
             return redirect('login');
         }
       
    }
    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=Cart::where('user_id', '=' ,$id)->get();
            return view('home.showcart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }
       
    }
    public function remove_cart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully');
    }
    public function cash_order()
    {
       
            $user=Auth::user();
            $userid=$user->id;
            $data=Cart::where('user_id', '=' ,$userid)->get();
            foreach($data as $data)
            {
                $order=new Order;
                $order->name=$data->name;
                $order->email=$data->email;
                $order->phone=$data->phone;
                $order->address=$data->address;

                $order->product_tittle=$data->product_title;
                $order->price=$data->price;
                $order->quantity=$data->quantity;
                $order->image=$data->image;
                $order->Product_id=$data->Product_id;

                $order->user_id=$data->user_id;

                $order->payment_status='Paid';
                $order->delivery_status='pending';
                $order->save();
                
                $cart_id=$data->id;
                $cart=Cart::find($data->id);
                $cart->delete();
               
            }
            return redirect()->back()->with('message', 'We have Received your Order. 
            We will connect with you soon...');      
    }
}
