<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Oreder;
use App\Models\OrederItem;
use App\Models\Cart;
use Illuminate\Http\Request;

class orederController extends Controller
{
    //
    public function index(){
        $orders=Oreder::where ('user_id',auth('web')->id())->with('OrederItems')->get();
        return view('User.order.index',compact('orders'));
    }
    public function show(Oreder  $oreder){
        $myOrder=$oreder->with('Items')->get();
        return view('User.order.show',compact('myOrder'));

    }
    public function store(Request $request){
        $input=$request->validate([
    'Location'=>['required'],
    'phonenumber'=>['required'],
    'Note'=>['nullable']
        ]);

        $oreder=Oreder::latest()->first();
        if (!$oreder){
            $orderId=1;
        }
        else{
            $orderId=$oreder->id+1;
        }

        $cartItem=Cart::where('user_id',auth('web')->id())->get();
       
        $total=0;
        foreach($cartItem as $item){
            OrederItem::create([
                'order_id'=>$orderId,
                'book_id'=>$item->book_id,
                'quantity'=>$item->qty,
            ]);
            $total=$total+$item->total;
            $item->decrease();
            $item->delete();
        }
        Oreder::create([
            'user_id'=>auth('web')->id(),
            'phonenumber'=> $input['phonenumber'],
            'Location'=>$input['Location'],
            'totalprice'=>$total,
            'Note'=>$input['Note'] ??null,

            'status'=>'pending',
        ]);
        return redirect()->route('orders.index')->with('success','your order is created succesfully');
    }
     public function checkout()
    {
        $cartItems = Cart::where('user_id', auth('web')->id())
                        ->with('book')
                        ->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('User.order.checkout', compact('cartItems'));
    }
}
