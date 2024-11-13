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
        Schema::create('pnt_banner', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('image',255);
            $table->string('link',1000);
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('position',255);
            $table->string('description',1000)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnt_banner');
    }
};
