<?php namespace Winter\Market\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('winter_market_products', function($table)  //nama table harus unik biar tidak bentrok dengan plugin lain
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('name')->nullable();
            $table->double( 'price' );
            $table->text('description')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('winter_market_products');
    }

}
