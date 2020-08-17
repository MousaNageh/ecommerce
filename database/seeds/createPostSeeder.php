<?php

use App\Post;
use Illuminate\Database\Seeder;

class createPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class , 2000)->create() ;
    }
}
