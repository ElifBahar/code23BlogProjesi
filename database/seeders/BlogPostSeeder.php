<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogPost::create([
            'title'=>'Blog1',
            'content'=>'Blog 1 Hakkında açıklama',

         ]);
        BlogPost::create([
            'title'=>'Blog2',
            'content'=>'Blog 2 Hakkında açıklama',

        ]);
        BlogPost::create([
            'title'=>'Blog3',
            'content'=>'Blog 3 Hakkında açıklama',

        ]);
    }
}
