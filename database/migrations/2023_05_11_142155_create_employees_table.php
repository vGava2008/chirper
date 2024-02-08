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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('last_name')->nullable();
            $table->string('position')->nullable();
            $table->string('surname')->nullable();
            $table->string('phone_number');
            $table->string('social')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('role')->nullable();
            $table->boolean('active')->default(true);
            $table->integer('sort')->unsigned()->default(999);
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
        Schema::dropIfExists('employees');
    }
};
