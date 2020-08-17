<?php

use App\Category;
use Illuminate\Database\Seeder;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name"=>"computer"
        ]) ; 
        Category::create([
            "name"=>"cell phones"
        ]) ;
        Category::create([
            "name"=>"laptobs"
        ]) ;
        Category::create([
            "name"=>"clothes"
        ]) ;
        

        

    }
}
