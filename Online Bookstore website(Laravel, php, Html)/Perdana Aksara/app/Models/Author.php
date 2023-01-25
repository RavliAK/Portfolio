<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function books(){
        return $this->hasMany(Book::class);
    }

    public function cart(){
        return $this->hasMany(Transaction::class);
    }
    //eloquent relationship dengan model Post, setiap model harus saling punya function seperti ini
}