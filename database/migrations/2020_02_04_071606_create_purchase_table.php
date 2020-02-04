<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('supplier_id');
            $table->integer('product_id');
            $table->integer('quantity')->nullable();
            $table->decimal('purchased_price', '8', '2')->nullable();
            $table->boolean('cancel');
            $table->timestamp('order_date');
            $table->timestamp('payment_date');
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase');
    }
}
