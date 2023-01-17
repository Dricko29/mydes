<?php

namespace Database\Seeders;

use App\Models\Blog\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'nama' => 'Desa',
            'slug' => Str::slug('Desa')
        ]);
        Tag::create([
            'nama' => 'Desa Maju',
            'slug' => Str::slug('Desa Maju')
        ]);
        Tag::create([
            'nama' => 'Desa Bisa',
            'slug' => Str::slug('Desa Bisa')
        ]);
    }
}