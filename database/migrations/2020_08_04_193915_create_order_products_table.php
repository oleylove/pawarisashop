<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('id')->comment('รหัส OrderDtl');
            $table->integer('user_id')->nullable()->comment('รหหัสลูกค้า');
            $table->integer('prod_id')->nullable()->comment('รหัสสินค้า');
            $table->integer('po_id')->nullable()->comment('รหัส Order');
            $table->integer('qty')->nullable()->comment('จำนวน');
            $table->float('price')->nullable()->comment('ราคารวม');
            $table->float('disc')->nullable()->comment('ส่วนลด');
            $table->float('net')->nullable()->comment('จ่ายสุทธิ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_products');
    }
}
