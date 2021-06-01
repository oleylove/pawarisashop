<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('id')->comment('รหัสสินค้า');
            $table->integer('inc_id')->nullable()->comment('รหัสบัญชี');
            $table->string('code')->comment('โค้ดสินค้า');
            $table->string('name')->comment('ชื่อสินค้า');
            $table->text('content')->comment('รายละเอียด');
            $table->string('size',5)->nullable()->comment('ขนาด');
            $table->string('color',20)->nullable()->comment('สี');
            $table->float('price')->default(0)->comment('ราคา');
            $table->float('cost')->default(0)->comment('ต้นทุน');
            $table->float('disc')->default(0)->comment('ส่วนลด');
            $table->integer('sold')->default(0)->comment('ขายไปแล้ว');
            $table->string('photo1')->default('photo1')->comment('รูป1');
            $table->string('photo2')->default('photo2')->comment('รูป2');
            $table->string('photo3')->default('photo3')->comment('รูป3');
            $table->integer('qty')->default(0)->comment('จำนวน');
            $table->integer('hot')->default(0)->comment('มาใหม่');
            $table->integer('likes')->default(0)->comment('ถูกใจ');
            $table->integer('view')->default(0)->comment('ยอดวิว');
            $table->integer('vote')->default(0)->comment('คะแนนโหวต');
            $table->integer('score')->default(0)->comment('คะแนนรวม');
            $table->float('rating')->default(0)->comment('ควมนิยม');
            $table->string('status',10)->default('ขาย')->comment('สถานะสินค้า');
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
        Schema::drop('products');
    }
}
