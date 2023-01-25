<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use App\Models\Review;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class BookController extends Controller
{
    public function index(){        
        $title ='';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in Genre ' . $category->name;
        }
        if(request('author')){
            $author = Author::firstWhere('slug', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('belanja',[
            "title"=>"All Books" . $title ,
            "active"=>'books',
            // "posts" => Post::all()
            // "posts" => Post::latest()->get()
            // "posts" => Post::with(['author','category'])->latest()->get()
            "books" => Book::latest()->filter(request(['search','category','author']))->paginate(12)->withQueryString(),
            //last come first served
            //tambahin with(['author','category']) untuk eager loading supaya mencegah n+1 problem --> UPDATE: udah ditambahin $with di Model/Post jadi gk perlu lagi
            //filter ada di Model Post
        ]);
    }
//index buat tampilin data di halaman posts

    public function show(Book $book){
    if(Auth::check()){
    return view('post',[
            "title"=>"book detail",
            "active"=>'books',
            "reviews" => Review::where("book_id", $book->id)->get(),
            "transaction"=>Transaction::where("user_id",auth()->user()->id)->where("book_id",$book->id),
            // "post"=>Post::find($id)
            "book"=> $book
        ]);}
        else{
    return view('post',[
        "title"=>"book detail",
        "active"=>'books',
        "reviews" => Review::where("book_id", $book->id)->get(),
        "transaction"=>Transaction::where("user_id",0),
        // "post"=>Post::find($id)
        "book"=> $book
    ]);}
    }
    //method show buat tampilin data di halaman single post
}
