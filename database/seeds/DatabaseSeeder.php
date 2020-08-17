<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CreateAdminSeeder::class) ; 
        $this->call(CreateCategorySeeder::class) ; 
        $this->call(CreateTagsSeeder::class) ; 
        $this->call(CreateUserSeeder::class) ; 
        $this->call(createPostSeeder::class) ; 
    }
}
