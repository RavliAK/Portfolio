<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class CartController extends Controller
{
    public function index(){        
        $title ='';
        return view('cart',[
            "title"=>"Shopping Cart",
            "active"=>'cart',
            // "posts" => Post::all()
            // "posts" => Post::latest()->get()
            // "posts" => Post::with(['author','category'])->latest()->get()
            "transactions" => Transaction::where('user_id',auth()->user()->id)->where('order_id',NULL)->get()
    
            // tambah ke ->where('order_id',NULL) sebelum get kalo order udh selesai dibikin
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */

    public function destroy(Transaction $transaction)
    {
       Transaction::destroy($transaction->id);
        return redirect('/cart')->with('success','Item removed');
    }

    public function checkQuantity(Transaction $transaction, Request $request){
        $transaction->qty=$request->quantity;
        $transaction->save();
        
        return redirect('/cart');
    }

    public function add(Book $book){
        $transactionData = ([
            'user_id'=> auth()->user()->id,
            'book_id'=>$book->id,
        ]);

    Transaction::create($transactionData);
    // $request->session()->flash('success','Registration successful!Please log in');
    return redirect('/belanja')->with('success','Item addded to cart');
     }

     public function assign(Order $order){
         return $order->id;
        $transactions = Transaction::where('user_id',auth()->user()->id)->where('order_id',NULL);
        foreach($transactions as $transaction){
        $transactionData = ([
            'user_id'=>$transaction->user->id,
            'book_id'=>$transaction->book->id,
            'order_id'=>$order->id
        ]);
    Transaction::where('id',$transaction->id)->update($transactionData);
     }
     
     return redirect('/history')->with('success','Checkout successful!'); 
    }

    public function report(){        
        
        return view('dashboard.reports.index',[
            
            "transactions" => Transaction::select("*")->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()

            //  ->whereNotNull('order_id')

        ]);
        
    }

}
