<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pnt_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->string('name',1000);
            $table->string('slug',1000);
            $table->float('price');
            $table->float('pricesale')->nullable();
            $table->string('image',1000);
            $table->unsignedInteger('qty');
            $table->text('detail');
            $table->string('description',255)->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updatad_by')->nullable();
            $table->tinyInteger('status')->unsigned()->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnt_product');
    }
};
