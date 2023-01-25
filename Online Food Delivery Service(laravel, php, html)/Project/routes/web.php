<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
class pizza{
    function _construct($nama,array $topping){
        $this->nama = $nama;
        $this->topping=$topping;
    }
    function getnama(){
        return $this->nama;
    }
    function getcategory(){
        return $this->topping;
    }    
}
$satu= new pizza('MEATeorites',['pepperoni','sausages']);
$dua= new pizza('Vegetarian',['Olives','onion']);
$tiga= new pizza('Half-n-Half',['pepperoni','onion']);
Route::get('/', function () {
    return view('login');
});
Route::get('/regist', function () {
    return view('regist');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/details1', function () {
    $nama = 'MEATeorites';
    $topping= 'pepperoni,sausages';
    $desc='Pizza for Meatlovers';
    return view('details', ['nama'=>$nama,'topping'=>$topping,'desc'=>$desc]);
});
Route::get('/details2', function () {
    $nama = 'Vegetarian';
    $topping= 'Olives,onion';
    $desc='Pizza for Vegetarians';
    return view('details', ['nama'=>$nama,'topping'=>$topping,'desc'=>$desc]);
});
Route::get('/details3', function () {
    $nama = 'Half-n-Half';
    $topping= 'pepperoni,onion';
    $desc='the best of both worlds';
    return view('details',['nama'=>$nama,'topping'=>$topping,'desc'=>$desc]
);
});
Route::get('/orderS', function () {
    $nama=$details->nama;
    $topping=$details->topping;
    $desc=$details->desc;
    $price=25000;
    return view('order',['nama'=>$nama,'topping'=>$topping,'desc'=>$desc, 'price'=>$price]);
});
Route::get('/orderM', function () {
    $nama=$details->nama;
    $topping=$details->topping;
    $desc=$details->desc;
    $price=50000;
    return view('order',['nama'=>$nama,'topping'=>$topping,'desc'=>$desc,'price'=>$price]);
});
Route::get('/orderL', function () {
    $nama=$details->nama;
    $topping=$details->topping;
    $desc=$details->desc;
    $price=100000;
    return view('order',['nama'=>$nama,'topping'=>$topping,'desc'=>$desc, 'price'=>$price]);
});