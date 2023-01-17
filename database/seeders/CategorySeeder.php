<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Blog\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nama' => 'Pembangunan Desa',
            'slug' => Str::slug('Pembangunan Desa')
        ]);
        Category::create([
            'nama' => 'Teknologi Desa',
            'slug' => Str::slug('Teknologi Desa')
        ]);
        Category::create([
            'nama' => 'Berita Desa',
            'slug' => Str::slug('Berita Desa')
        ]);
    }
}