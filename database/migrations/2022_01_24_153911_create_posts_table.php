<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('likes')->default(0);
            $table->string('thumbnail_url');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('description');
            $table->mediumText('content');
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
};
