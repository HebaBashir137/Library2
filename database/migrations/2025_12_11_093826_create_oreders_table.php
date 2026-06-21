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
        Schema::create('oreders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('phonenumber');
            $table->string('Location');
            $table->float('totalprice');
            $table->text('Note')->nullable();
            $table->string('status')->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oreders');
    }
};
