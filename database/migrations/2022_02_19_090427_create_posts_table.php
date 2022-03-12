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
            $table->id();
            $table->longtext('name');
            $table->longtext('slug');
            $table->integer('views')->default('0');
            $table->integer('likes')->default('0');      
            $table->foreignId('users_id')->references('id')->on('users')->cascadeOnDelete();  
            $table->boolean('status')->defaut('0'); // 0 = not approved 
            $table->softDeletes();
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
