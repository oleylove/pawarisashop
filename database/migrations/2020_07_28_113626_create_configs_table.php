<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->collation = 'utf8_unicode_ci';
            $table->charset = 'utf8';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('line')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->integer('freeshipping')->default(1000);
            $table->integer('shipping')->default(100);
            $table->string('bbl')->nullable();
            $table->string('bbl_logo')->default('bbl_logo');
            $table->string('kbsnk')->nullable();
            $table->string('kbsnk_logo')->default('kbsnk_logo');
            $table->string('scb')->nullable();
            $table->string('scb_logo')->default('scb_logo');
            $table->string('bay')->nullable();
            $table->string('bay_logo')->default('bay_logo');
            $table->string('logo')->nullable();
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
        Schema::drop('configs');
    }
}
