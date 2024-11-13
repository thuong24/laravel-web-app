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
        Schema::create('pnt_user', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('username',255);
            $table->string('password',255);
            $table->string('email',255);
            $table->string('phone',255);
            $table->string('address',255)->nullable();
            $table->string('gender',255);
            $table->string('image',255)->nullable();
            $table->string('remember_token',255)->nullable();
            $table->enum('roles',['admin','customer']);
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('pnt_user');
    }
};
