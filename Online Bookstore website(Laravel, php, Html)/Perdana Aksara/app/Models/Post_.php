<?php
// Model post yg lama
namespace App\Models;

class Post
{
 private static $blog_posts= [
     [
    "title"=>"Judul post pertama",
    "slug"=>"judul-post-1",
    "author"=>"Nicholas Owen",
    "body"=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores ipsa exercitationem temporibus sapiente id at error, repudiandae quos? Quos atque molestiae dignissimos necessitatibus natus dolores, vitae ipsa deleniti praesentium dolore veritatis quisquam quidem repellat molestias tenetur sapiente optio neque iusto blanditiis veniam nisi sed ut fugiat? Pariatur optio laboriosam quae eos maiores cum rem magnam sequi quasi blanditiis voluptas eligendi, vero accusamus ab, perspiciatis dolore corporis. Laudantium doloribus quis ad repellat? Quidem dolor deleniti ipsum quisquam neque saepe velit officiis."
],
[
    "title"=>"Judul post kedua",
    "slug"=>"judul-post-2",
    "author"=>"Ruben Marton",
    "body"=>"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos earum est odio. Quidem provident necessitatibus eveniet. Hic veritatis molestias minima provident debitis voluptatem corrupti, ex, ipsam inventore dicta nostrum fugit cupiditate, facilis odit sunt ipsa eum eaque ea nulla totam unde culpa deleniti amet vero. Asperiores, enim. Numquam assumenda rem sunt quo at dolorum qui sed, obcaecati officiis, accusantium quisquam ipsa modi consequatur dolore distinctio provident corporis magnam quidem blanditiis iure nisi commodi nihil ad. Dignissimos possimus odit reiciendis inventore nemo voluptate esse. Magnam perferendis fugit et deserunt blanditiis distinctio temporibus unde consequuntur excepturi dolores, voluptate ea magni similique eaque!"
]
];

public static function all(){
    return collect (self::$blog_posts);
    //ubah array blog_posts jadi collection supaya bisa pake fungsi seperti first/last/dll
    //return self karena blog_posts  property static
    //klo misalnya ga static bisa langsung return $this->blog_posts;
}

public static function find($slug){
    // $posts = self::$blog_posts;
    $posts = static::all();
    //buat ambil dlu semua postnya
    // $post = [];
    // foreach($posts as $p){
    //     if($p["slug"] === $slug){
    //         $post = $p;
    //     }
    //     //dilooping satu2
    // }
    return $posts->firstWhere('slug',$slug);
    //bisa pake ->first() karena array blog_posts udah diubah jadi collection
    //ubah jadi collection cuma tambah collect();
}
}
