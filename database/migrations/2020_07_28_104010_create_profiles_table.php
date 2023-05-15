<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('id')->comment('รหัสโปรไฟล์');
            $table->integer('user_id')->nullable()->comment('รหัสลูกค้า');
            $table->string('name',150)->nullable()->comment('ชื่อลูกค้า');
            $table->string('phone',12)->nullable()->comment('เบอร์โทร');
            $table->text('address')->nullable()->comment('ที่อยู่');
            $table->string('status',10)->nullable()->comment('สำหรับจัดส่งสินค้า');
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
        Schema::drop('profiles');
    }
}
