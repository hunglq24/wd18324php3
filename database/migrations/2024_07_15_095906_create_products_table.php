<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // php artisan migrate
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); // id: int | unsigned | primary
            $table->string('name', 200);
            $table->float('price', 8, 2); //8.22
            $table->integer('view');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // php artisan migrate:rollback
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
