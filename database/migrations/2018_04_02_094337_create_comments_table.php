<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'comments',
            function (Blueprint $table) {
                $table->increments('id');
                $table->bigInteger('post_id')->nullable();
                $table->bigInteger('category_id')->nullable();
                $table->string('author');
                $table->text('content');
                $table->timestamp('created_at');
                //$table->dateTime('created_at');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}