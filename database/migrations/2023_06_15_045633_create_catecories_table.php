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
        Schema::create('catecories', function (Blueprint $table) {
            $table->id();//id BIGINT usigned AUTO_INCREMENT PRIMARY
            $table->string('name',255);//VARCHAR 
            $table->timestamps();
            //  created_at , updated_at 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catecories');
    }
};
