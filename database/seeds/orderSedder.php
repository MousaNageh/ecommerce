<?php

use App\Order;
use Illuminate\Database\Seeder;

class orderSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(Order::class,200)->create() ; 
    }
}