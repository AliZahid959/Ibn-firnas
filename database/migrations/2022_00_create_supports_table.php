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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('support_name')->unique();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('support_image')->nullable();
            $table->text('body')->nullable();

            $table->text('meta_keyword');
            $table->string('meta_description');
            $table->string('status')->default('Publish');            
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
        Schema::dropIfExists('supports');
    }
};
