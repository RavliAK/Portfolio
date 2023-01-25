<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index' ,[
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' =>Category::all(),
            'authors' =>Author::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:books',
            'author_id' => 'required',
            'category_id' => 'required',
            // 'image'=>'image|file|max:3072',
            'image'=>'image|file',
            'body' => 'required',
            'price' => 'required',
            'year' => 'required',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('book-images');
        }
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        
        Book::create($validatedData);
        
        return redirect('/dashboard/posts')->with('success','New book has been added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('dashboard.posts.show',[
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.posts.edit',[
            'book' => $book,
            'categories' =>Category::all(),
            'authors' => Author::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'author_id' => 'required',
            'image'=>'image|file',
            'body' => 'required',
            'price' => 'required',
            'year' => 'required',
        ];

        


        if($request->slug != $book->slug){
        $rules['slug'] = 'required|unique:books';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('book-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        
        Book::where('id',$book->id)->update($validatedData);
        
        return redirect('/dashboard/posts')->with('success','Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->image){
            Storage::delete($book->image);
        }

        Book::destroy($book->id);
        
        return redirect('/dashboard/posts')->with('success','Book has been deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Book::class,'slug',$request->title);
        return response()->json(['slug' => $slug]);
    }
    }

