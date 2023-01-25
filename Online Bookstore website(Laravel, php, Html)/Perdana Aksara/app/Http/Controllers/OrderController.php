<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
    return view('history',[
        "title"=>"History",
        "active"=>"history",
        'ordersD'=>Order::where('user_id',auth()->user()->id)->where('status','done')->get(),
        'ordersO'=>Order::where('user_id',auth()->user()->id)->where('status','ongoing')->get(),
        'ordersP'=>Order::where('user_id',auth()->user()->id)->where('status','Pending')->get(),
        'ordersC'=>Order::where('user_id',auth()->user()->id)->where('status','cancelled')->get()
    ]);
    }
    public function invoice(Order $order)
    {
        return view('invoice',[
            'title' => "Invoice",
            'order' => $order,
            'transactions'=> Transaction::where('order_id',$order->id)->get()
        ]);
    }
    public function destroy(Order $order){
        
        $transactions = Transaction::where('order_id',$order->id)->get();
        foreach($transactions as $transaction){
        $transactionData = ([
            'order_id'=>NULL
         ]);
        Transaction::where('id',$transaction->id)->update($transactionData);
        }
        
        Order::destroy($order->id);
        return redirect('/cart')->with('success','order has been deleted');
     }

     public function store(Request $request){
        if($request->method=="pickup"){
        $validatedData = $request->validate([
            'price'=>'required',
            'kota'=>'required'
        ]);
    }
        elseif($request->method=="delivery"){
            $validatedData = $request->validate([
                'address'=>'required',
                'address2'=>'required',
                'kurir'=>'required',
                'provinsi'=>'required',
                'kota'=>'required',
                'zip'=>'required|max:5|min:5',
                'price'=>'required',
            ]);
        }
        $validatedData['resi'] = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['order_date'] = \Carbon\Carbon::now()->timestamp;
        // $validatedData['password'] = Hash::make($validatedData['password']);
        $transactions = Transaction::where('user_id',auth()->user()->id)->where('order_id',NULL)->get();

        
        if($transactions){
        $order=Order::create($validatedData);
        } else return redirect("/cart");
        
        foreach($transactions as $transaction){
        $transactionData = ([
            'order_id'=>$order->id
         ]);
        Transaction::where('id',$transaction->id)->update($transactionData);
        }
        
        if($request->method=="pickup"){
        return redirect("/order/pickup/$order->id");
        }
        elseif($request->method=="delivery")
        return redirect("/order/delivery/$order->id");
    }
    public function latestP(Order $order)
    { 
            switch($order->kota) {
                case('Jakarta'):
                    $msg = 'Jl. Tambra Raya No. 23 Rawamangun, Jakarta 13220';
                    break;
                case('Bandung'):
                    $msg = 'Jl. Galaksi Raya VI No. 89, Margahayu Raya, Bandung';
                    break;
                case('Medan'):
                    $msg = 'Jl. Pertemuan No. 52 Kelurahan Sidorame Timur, Medan, Sumatera Utara';
                    break;
                case('Yogyakarta'):
                    $msg = 'Kanoman RT 01 RW 05 Banyuraden, Sleman, Yogyakarta';
                    break;
                case('Pekanbaru'):
                    $msg = 'Perumahan Metro Park, Jl. Garuda Sakti No. 1, Labuh Baru, Pekanbaru';
                    break;
                case('Makassar'):
                    $msg = 'Jl. Aroepala Komp. Permata Hijau Lestari Blok P6 No. 02 Makassar 90222';
                    break; 
                case('Palembang'):
                    $msg = 'Jl. Proklamasi Blok I No. 15A Kampus POM IX Kel. Lorok Pakjo, Kec. Ilir Barat I, Palembang 30137';
                    break; 
                case('Surabaya'):
                    $msg = 'Jl. Rungkut Harapan Blok K No. 21, Surabaya';
                    break;
                case('Lampung'):
                    $msg = 'Perumahan Metro Park, Jl. Garuda Sakti No. 1, Labuh Baru, Pekanbaru';
                    break; 
                case('Bali'):
                    $msg = 'Jl. Tukad Banyusari Gang XIV A No. 6 Sesetan, Denpasar';
                    break;     
                default:
                    $msg = 'Something went wrong.';
                }
        return view('PayP',[
            "title"=>"Payment",
            'order' => $order,
            'alamat'=> $msg
        ]);
        
    }
    public function latestD(Order $order){

        return view('payD',[
            "title"=>"payment",
            'order' => $order
        ]);
    }

    public function update(Order $order,Request $request){
        
     if($request->pinput=="card"){
        $paymentData=$request->validate([
            'card-name'=>'required|required',
            'card-number'=>'required|max:16|min:16',
            'card-expiration'=>'required|max:4|min:4',
            'card-cvv'=>'required|max:3|min:3',
            'pmethod'=>'required'
        ]);
        $order->update($paymentData);
        }
       elseif($request->pinput=="phone"){
        $paymentData=$request->validate([
            'pmethod'=>'required',
            'no-hp'=>'required|max:14|min:12'
        ]);
        $order->update($paymentData);
        }
        elseif($request->pinput=="virtual"){
            $paymentData=$request->validate([
                'pmethod'=>'required',
            ]);
        $order->update($paymentData);
        }
    
    return redirect("/email/$order->id")->with('success','Checkout successful!'); 
   }

}