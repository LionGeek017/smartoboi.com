<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_modals', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru');
            $table->string('title_uk');
            $table->string('title_en');
            $table->text('description_ru');
            $table->text('description_uk');
            $table->text('description_en');
            $table->text('url');
            $table->string('img')->nullable();
            $table->integer('act')->default(1);
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
        Schema::dropIfExists('ad_modals');
    }
}
