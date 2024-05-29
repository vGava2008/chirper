<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->text('user_id')->nullable();
            $table->text('brand_id')->nullable();
            $table->text('name');
            $table->string('category_id')->nullable();
            $table->text('description')->nullable();
            $table->json('phone_numbers')->nullable();
            $table->boolean('active')->default(true);
            $table->json('web_pages')->nullable();
            $table->json('socials')->nullable();
            $table->json('meta')->nullable();
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
        Schema::dropIfExists('services');
    }
};
