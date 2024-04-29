<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Support\Facades\Session;
use Stripe;

class Homecontroller extends Controller
{
   
    public function index(){

        $data = product::paginate(3);

     return view('home.userpage',compact('data'));

        
    }

    public function redirect()
    {

   $user_type = Auth::user()->usertype;

   if($user_type == '1')
   {
      $total_product = product::all()->count();
      $total_users = User::all()->count();
      $total_order = Order::all()->count();
      $orders = Order::all();
      $total_price = 0 ;
      foreach($orders as $order)
      {

       $total_price = $total_price + $order->price;



      }

      $total_delevery = Order::where('delivery_status','=','Deleveried')->get()->count();
      $total_processing = Order::where('delivery_status','=','proccesing')->get()->count();
      
      


      return view('admin.home',compact('total_product','total_users','total_order','total_price','total_delevery','total_processing'));

   }

   else
   {

    $data = product::paginate(3);

    return view('home.userpage',compact('data'));

   }


    }
    

    public function product_details($id)
    {
      $product = product::find($id);

     return view('home.product_details',compact('product'));
     
    }


    public function add_cart(Request $request,$id)
    {


        if(Auth::id())
        {

         $user = Auth::user();
         $product = product::find($id);

         $cart = new Cart;
         $cart->name=$user->name;

         $cart->email=$user->email;

         $cart->phone=$user->phone;

         $cart->address=$user->address;

         $cart->user_id=$user->id;

         $cart->user_id=$user->id;

         $cart->product_titile=$product->title;

         $cart->quantity=$request->quantity;

         if($product->discount_price!=null)
         {

            $cart->price=$product->discount_price * $request->quantity;
       
         }
        else{
         $cart->price=$product->price *$request->quantity ;
        }
         $cart->image=$product->image;

         $cart->product_id=$product->id;

         $cart->save();

         return redirect()->back()->with('message','Your prodect was add to cart');



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

       $id = Auth::user()->id;
       $cart = Cart::where('user_id','=',$id)->get();
       return view('home.show_cart',compact('cart'));
        }

        else
        {


       return redirect('login');

        }
      

    }


    public function remove_cart($id)
    {

         $cart = Cart::find($id);

         $cart->delete();

         return redirect()->back();

    }


    public function cash_order()
    {

      $user = Auth::user();

      $userid = $user->id;

      $data =cart::where('user_id','=',$userid)->get();

      foreach($data as $data)
      {

          $order = new Order;

          $order->name = $data->name;
          $order->email = $data->email;
          $order->phone = $data->phone;
          $order->address = $data->address;
          $order->user_id = $data->user_id;

          $order->product_title = $data->product_titile;
          $order->quantity = $data->quantity;
          $order->price = $data->price;
          $order->image = $data->image;
          $order->product_id = $data->product_id;

          $order->payment_status = 'cash on delevery';
          $order->delivery_status = 'proccesing';

          $order->save();


          $cart_id = $data->id;
          $cart = Cart::find($cart_id);
          $cart->delete();

         


      }

      return redirect()->back()->with('message','We have Recieve your Order. We will Connect With you soon..');

    }


    public function stripe($total_price)
    {



        return view('home.stripe',compact('total_price'));
    }





    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment." 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }


    public function show_order()
  
    {

        if(Auth::id())
        {

       $id = Auth::user()->id;
       $orders = Order::where('user_id','=',$id)->get();
       return view('home.orderpage',compact('orders'));
        }

        else
        {


       return redirect('login');

        }

    }


    public function remove_order($id)

    {

      $order = Order::find($id);
      $order->delivery_status = 'You Are removed';
      $order->save();

      return redirect()->back();


    }


   


    

}
