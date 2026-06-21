<?php

namespace App\Http\Controllers\User;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class cartController extends Controller
{
    // 
    public function index(){
     $cartItems = Cart::where('user_id', auth('web')->id())->with('book')->get(); //or first()
      Log::info('Cart Debug:', [
        'user_id' => auth('web')->id(),
        'cart_count' => $cartItems->count(),
        'items' => $cartItems->map(function($item) {
            return [
                'id' => $item->id,
                'book_id' => $item->book_id,
                'qty' => $item->qty,
                'book_title' => optional($item->book)->title,
                'book_price' => optional($item->book)->price,
                'calculated_total' => $item->qty * (optional($item->book)->price ?? 0),
                'accessor_total' => $item->total, // This should show if accessor works
                'has_book_relation' => $item->relationLoaded('book'),
                'book_exists' => !is_null($item->book)
            ];
        })->toArray()
    ]);
    
    // Calculate total manually as fallback
    $total = $cartItems->sum(function($item) {
        return $item->qty * ($item->book->price ?? 0);
    });
    
    Log::info('Total calculated:', ['total' => $total]);
    
    return view('User.Cart.index', compact('cartItems'));


// foreach ($cartItems as $item) {
    //    $item->book->remaining_stock = $item->book->quantity - $item->qty;
   // }
    
    //return view('User.Cart.index', compact('cartItems'));
}




     
    


    public function store (Request $request){
        $input=$request->validate([
            'book_id'=>['required','integer','exists:books,id'],
            //'qty'=>'nullable|integer|min:1', or make if 
            //db transactions

        ]);
       
        $input['user_id']=auth('web')->id();
        $cartItem = Cart::where('user_id', $input['user_id'])
                        ->where('book_id', $input['book_id'])->first();

                        // 2 wheres =>and
        if(!$cartItem){ Cart::create($input);
            //if here 
            return redirect()->route('cart.index')->with('sucess','book is added successfully');
    }
        

        if($cartItem){
            // Update quantity if item already in cart
           //$cartQty= $cartItem->qty += $request->qty;
           $cartQty= $cartItem->qty +1;
           if ($cartQty>$cartItem->book->quantity){
            return redirect()->back()->with('error','qty is not available');
           }
           $cartItem->qty=$cartQty;
            $cartItem->save();
        
        return redirect()->back()->with('success', 'qty is increased!');
    }}

    public function update (Request $request){
        // increase 
        $input= $request->validate([
            'book_id'=>['required','exists:books,id']
            ] );
            $cartItem=Cart::where ('user_id',auth('web')->id())->where('book_id',$input['book_id'])->first();
             $cartQty= $cartItem->qty +1;
           if ($cartQty>$cartItem->book->quantity){
            return redirect()->back()->with('error','qty is not available');
           }
           $cartItem->qty=$cartQty;
            $cartItem->save();
            return redirect()->route('cart.index')->with('success','qty is increased succesfullty<3');



    }
    public function remove (Request $request){
        $input= $request->validate([
            'book_id'=>['required','exists:books,id']
            ] );
           $cartItem=Cart::where ('user_id',auth('web')->id())->where('book_id',$input['book_id'])->first();
             $cartQty= $cartItem->qty-1;
           if ($cartQty<1){
            return redirect()->back()->with('error','qty is not available');
           }
           $cartItem->qty=$cartQty;
            $cartItem->save();
            return redirect()->route('cart.index')->with('success','qty is decreased successfully');



    }
     

            public function destroy (string $id){
      
             $cartItem=Cart::where ('user_id',auth('web')->id())->where('book_id',$id)->first();
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success','item is reomved from your cart successfully');
     }       }
     
