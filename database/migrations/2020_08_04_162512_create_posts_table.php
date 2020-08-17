<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements("id") ; 
            $table->string("title") ; 
            $table->text("content") ; 
            $table->string("featured") ; 
            $table->string("country") ; 
            $table->string("status") ; 
            $table->integer("price") ; 
            $table->string("coil") ; 
            $table->tinyInteger("approve")->default(0) ; 
            $table->integer("category_id") ; 
            $table->integer("user_id") ; 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
