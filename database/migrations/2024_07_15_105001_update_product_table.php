<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     // migrate
    public function up(): void
    {
        // Schema::create('products', function (Blueprint $table) {
        //     $table->string('description', 500)->nullable(); 
            
        // });
        //  Schema::table('products', function(Blueprint $table){
            // $table->string('product_id');
            //$table->string('name', 250)->change();
            //$table->renameColumn('price', 'product_price');
            // $table->dropColumn('price');
            // $table->float('product_price', 10,2)->after('name');
        // });
        //
    }

    /**
     * Reverse the migrations.
     */

     // migrate::rollback
    public function down(): void
    {
        // Schema::table('products', function(Blueprint $table){
            // $table->increments('id');
            // $table->string('name', 200)->change();
            // $table->renameColumn( 'product_price', 'price');
            // $table->dropColumn('product_price');
            // $table->float('price', 8,2);
        // });
        //
    }
};
