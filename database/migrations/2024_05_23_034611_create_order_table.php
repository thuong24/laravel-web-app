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
        Schema::create('pnt_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name',255);
            $table->string('phone',255);
            $table->string('email',255);
            $table->string('address',255);
            $table->string('note',1000)->nullable();
            $table->string('type',50)->default('online');
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
        Schema::dropIfExists('pnt_order');
    }
};
