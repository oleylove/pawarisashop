<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('id')->comment('รหัสออเดอร์');
            $table->integer('inc_id')->nullable()->comment('รหัสบัญชี');
            $table->integer('user_id')->comment('รหัสลูกค้า');
            $table->float('shipping')->default(0)->comment('ค่าจัดส่ง');
            $table->float('price')->default(0)->comment('ราคารวม');
            $table->float('disc')->default(0)->comment('ส่วนลด');
            $table->float('net')->comment('รวมจ่าย');
            $table->string('tracking')->nullable()->comment('เลขพัสดุ');
            $table->integer('score_total')->default(0)->comment('แต้มสะสม');
            $table->string('status',50)->comment('สถานะจัดส่ง');
            $table->string('slip')->nullable()->comment('สลิป');
            $table->timestamp('paid_at')->nullable()->comment('เวลาชำระเงิน');
            $table->timestamp('checking_at')->nullable()->comment('เวลายืนยันชำระเงิน');
            $table->timestamp('sent_at')->nullable()->comment('เวลาจัดส่ง');
            $table->timestamp('completed_at')->nullable()->comment('เวลารับสินค้า');
            $table->timestamp('cancelled_at')->nullable()->comment('เวลายกเลิก');
            $table->text('address')->nullable()->comment('ที่อยู่จัดส่ง');
            $table->string('consignee',150)->nullable()->comment('คนรับของ');
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
        Schema::drop('orders');
    }
}
