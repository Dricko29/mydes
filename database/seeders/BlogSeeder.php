<?php

namespace Database\Seeders;

use App\Models\Blog\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory(100)->create();
        foreach(Blog::all() as $blog ){
            $tags = \App\Models\Blog\Tag::inRandomOrder()->take(rand(1,3))->pluck('id');
            $blog->tags()->attach($tags);
        }
        
    }
}