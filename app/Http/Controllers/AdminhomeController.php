<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\Order;
use App\Models\product;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf as PDF;


class AdminhomeController extends Controller
{
    public function view_catagory()
    {
      $data =Catagory::all();
      return view('admin.catagory',compact('data'));

    }

    public function add_catagory(Request $request){

        $data = new catagory;

        $data->catagory_name=$request->catagory ;

        $data->save();

        return redirect()->back()->with('message','Catagory added succesfully');

    }


    public function delete_catagory($id)


    {

     $data=Catagory::find($id);
     $data->delete();
     return redirect()->back()->with('message','The Catagory deleted Successfuly');

    }

    public function view_prodect()
    {
       $catagory =Catagory::all();
       return view('admin.product',compact('catagory'));
    }


    public function add_product(Request $request){

      $product = new product;
      $product->title= $request->product_title;
      $product->description= $request->description;
      $product->price= $request->price;
      $product->discount_price= $request->discount;
      $product->catagory= $request->catagory;
      $product->quantity= $request->catagory;
      

      $image= $request->image;
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product',$imagename);
      $product->image= $imagename;

      $product->save();



      return redirect()->back()->with('message','product Added Successfully');
      
    }


  public function show_product()
  {
      $product = product::all();
   return view('admin.show_product',compact('product'));


   
  }
  public function delete_product($id)
  {

      $product = product::find($id);
      $product->delete();
      return redirect()->back();

  }

  public function update_product($id)
  {
       $product=product::find($id);
      return view('admin.update_product',compact('product'));
  }


  public function confirm_update_product(Request $request,$id)
  {

    $product=product::find($id);
    $product->title = $request->product_title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->discount_price = $request->discount;
    $product->quantity = $request->quantity;
    $product->save();
    return redirect()->back();

  }


  public function view_order()
  {
     $order = Order::all();

   return view('admin.order',compact('order'));

  }

    public function update_order($id)

    {

      $order = Order::find($id);

      $order->delivery_status = 'Deleveried';

      $order->payment_status = 'Paid';

      $order->save();

      return redirect()->back();


    }


    public function print_pdf($id)
    {
       $order = Order::find($id);

       $pdf = $pdf = PDF::loadView('admin.pdf',compact('order'));

       


       return $pdf->download('order_details.pdf');

    }


    public function search(Request $request)

    {

      $search = $request->search;
      $order =Order::where('name','LIKE',"%$search%")->orwhere('product_title','LIKE',"%$search%")->get();
      return view('admin.order',compact('order'));

    }

}


