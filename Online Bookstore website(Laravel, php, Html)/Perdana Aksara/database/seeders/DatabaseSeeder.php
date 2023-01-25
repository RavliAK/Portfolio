<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use App\Models\Author;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         
        User::create([
            'name'=>'Owen',
            'username'=>'Owen',
            'email'=>'owen.djohan@gmail.com',
            'password'=>bcrypt('12345'),
            'is_admin'=>1
        ]);

        User::factory(30)->create();
        Author::factory(20)->create();

        // Author::create([
        //     'name'=>'J Stien',
        //     'slug'=>'j_stien'
        // ]);
        // Author::create([
        //     'name'=>'I Wanna Die',
        //     'slug'=>'i_wanna_die'
        // ]);


        Category::create([
            'name'=>'Novel',
            'slug'=>'novel'
        ]);

        Category::create([
            'name'=>'Komik',
            'slug'=>'komik'
        ]);

        Category::create([
            'name'=>'Akademik',
            'slug'=>'akademik'
        ]);

        Category::create([
            'name'=>'Buku Anak',
            'slug'=>'bukuanak'
        ]);

        Category::create([
            'name'=>'Resep',
            'slug'=>'resep'
        ]);

        Book::factory(20)->create();
 

        // Book::create([
        //     'title'=>'Rin Shibuya Biography',
        //     'category_id'=>1,
        //     'author_id'=>1,
        //     'slug'=>'shiburinbio',
        //     'excerpt'=>'Rin Shibuya (Japanese: 渋谷凛 Shibuya Rin) is one of the characters available in THE iDOLM@STER: Cinderella Girls and THE iDOLM@STER Cinderella Girls: Starlight Stage. She is voiced by Ayaka Fukuhara (Japanese: 福原綾香 Fukuhara Ayaka). She is affiliated with 346 Production in Gravure for You! and the anime.',
        //     'body'=>'<p>Rin Shibuya is the Cool-attribute representative of Cinderella Girls. She forms the Cinderella Girls main trio along with Uzuki and Mio initially due </p><p>
        //     to their role as tutorial idols in both THE iDOLM@STER: Cinderella Girls and THE iDOLM@STER Cinderella Girls: Starlight Stage.
        //     According to her first Starlight Stage Memorial commu, Rin was scouted by Producer on a busy street corner in the middle of Tokyo. After bumping into him, 
        //     Rin tells him to get out her way and asks who he is rather coldly. After Rin tells him that she noticed him staring at her for a while, Producer scouts her
        //      to join his idol production. Rin calls him stupid and tells him that scouting her as an idol is a joke. Rin harshly warns him if he keeps standing in front
        //      of her, he ll get arrested; she briskly leaves right after. Every day since, Producer keeps meeting Rin at the same street corner and attempts to scout her.</p><p>
        //      After a few days, Rin calls him persistent and asks him why he keeps targeting her. After saying that her "half-assed" effort might deter her in being a successful
        //      idol, Rin then changes her mind and says that she realizes that there s nothing she specifically wants to do. Rin remarks that this apathy troubles her and begins to
        //      ask herself what she wants for the present and the future. Producer, in reply, suggests that they find what she wants together. She sighs and remarks that she doesn t
        //      know what being an idol will be like, but she s willing to try it to see if she can find what she s looking for. Right before she accepts his proposal, a police officer
        //      interrupts and asks Rin if this shady man is causing her trouble. Rin responds that Producer isn t suspicious (she thinks, maybe). After the kerfuffle, Rin asks Producer
        //      his name and introduces herself in turn, starting her idol journey. In the anime, she becomes interested in being an idol after hearing Uzuki talk about her dream of being 
        //     top idol as well as seeing her smile.</p>',
        // ]);

        // Book::create([
        //     'title'=>'Rin Shibuya Novel',
        //     'category_id'=>2,
        //     'author_id'=>2,
        //     'slug'=>'shiburinovel',
        //     'excerpt'=>'Rin Shibuya (Japanese: 渋谷凛 Shibuya Rin) is one of the characters available in THE iDOLM@STER: Cinderella Girls and THE iDOLM@STER Cinderella Girls: Starlight Stage. She is voiced by Ayaka Fukuhara (Japanese: 福原綾香 Fukuhara Ayaka). She is affiliated with 346 Production in Gravure for You! and the anime.',
        //     'body'=>'<p>Rin Shibuya is the Cool-attribute representative of Cinderella Girls. She forms the Cinderella Girls main trio along with Uzuki and Mio initially due </p><p>
        //     to their role as tutorial idols in both THE iDOLM@STER: Cinderella Girls and THE iDOLM@STER Cinderella Girls: Starlight Stage.
        //     According to her first Starlight Stage Memorial commu, Rin was scouted by Producer on a busy street corner in the middle of Tokyo. After bumping into him, 
        //     Rin tells him to get out her way and asks who he is rather coldly. After Rin tells him that she noticed him staring at her for a while, Producer scouts her
        //      to join his idol production. Rin calls him stupid and tells him that scouting her as an idol is a joke. Rin harshly warns him if he keeps standing in front
        //      of her, he ll get arrested; she briskly leaves right after. Every day since, Producer keeps meeting Rin at the same street corner and attempts to scout her.</p><p>
        //      After a few days, Rin calls him persistent and asks him why he keeps targeting her. After saying that her "half-assed" effort might deter her in being a successful
        //      idol, Rin then changes her mind and says that she realizes that there s nothing she specifically wants to do. Rin remarks that this apathy troubles her and begins to
        //      ask herself what she wants for the present and the future. Producer, in reply, suggests that they find what she wants together. She sighs and remarks that she doesn t
        //      know what being an idol will be like, but she s willing to try it to see if she can find what she s looking for. Right before she accepts his proposal, a police officer
        //      interrupts and asks Rin if this shady man is causing her trouble. Rin responds that Producer isn t suspicious (she thinks, maybe). After the kerfuffle, Rin asks Producer
        //      his name and introduces herself in turn, starting her idol journey. In the anime, she becomes interested in being an idol after hearing Uzuki talk about her dream of being 
        //     top idol as well as seeing her smile.</p>',
        // ]);
        // Book::create([
        //     'title'=>'ASD',
        //     'category_id'=>2,
        //     'author'=>'2',
        //     'slug'=>'asdl',
        //     'excerpt'=>'saddasdsad',
        //     'body'=>'adadsadadsadasdasdasdsadasdadsadas',
        // ]);
    }
}
