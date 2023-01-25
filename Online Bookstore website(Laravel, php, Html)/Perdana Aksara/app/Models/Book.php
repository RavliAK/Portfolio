<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory;
    use Sluggable;

    //protected $fillable =['title','excerpt','body'];
    protected $guarded = ['id'];
    //fillable/guarded supaya bisa mass assignment di artisan tinker
    //guarded itu kebalikan fillable

    protected $with = ['category', 'author'];
    // $with biar tiap kali query, dipanggil category dan author

    public function category(){
        return $this->belongsTo(Category::class);
    }
    //eloquent relationship dengan class Category


     public function author(){
         return $this->belongsTo(Author::class);
         //butuh parameter user_id karena laravel gk recognise author di model User 
        }

     public function user(){
         return $this->belongsTo(User::class);
         //butuh parameter user_id karena laravel gk recognise author di model User 
        }
        public function cart(){
            return $this->hasMany(Transaction::class);
        }
        public function reviews(){
            return $this->hasMany(Review::class);
        }

    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('title','like','%' . $filters['search'] . '%')
        //     ->orWhere('body','like','%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title','like','%' . $search . '%')
                        ->orWhere('body','like','%' . $search . '%');
        });// query untuk searching, if ada search/pencarian 

        $query->when($filters['category'] ?? false, function($query,$category){
         return $query->whereHas('category',function($query) use ($category){
        $query->where('slug',$category);
    });
    
    //pake use $ category klo gk gbisa direcognise category yg di function( , )
    });
    $query->when($filters['author'] ?? false, function($query,$author){
        return $query->whereHas('author',function($query) use ($author){
       $query->where('slug',$author);
   });
   
   //pake use $ category klo gk gbisa direcognise category yg di function( , )
   });
        //query untuk searching dengan kategori spesifik aja(bukan all Books)
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    //biar semua route otomatis cari slug bukan id

    public function sluggable(): array
    {
        return [
            'slug' =>[
                'source' => 'title'
            ]
            ];
    }
}


