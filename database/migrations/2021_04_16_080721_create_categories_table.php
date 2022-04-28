<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('title_ru');
            $table->string('title_uk');
            $table->string('title_en');
            $table->string('slug');
            $table->text('text_short_ru')->nullable();
            $table->text('text_short_uk')->nullable();
            $table->text('text_short_en')->nullable();
            $table->text('text_full_ru')->nullable();
            $table->text('text_full_uk')->nullable();
            $table->text('text_full_en')->nullable();
            $table->string('meta_title_ru')->nullable();
            $table->string('meta_title_uk')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_description_ru')->nullable();
            $table->text('meta_description_uk')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_keywords_ru')->nullable();
            $table->text('meta_keywords_uk')->nullable();
            $table->text('meta_keywords_en')->nullable();
            $table->string('img');
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('categories');
    }
}
