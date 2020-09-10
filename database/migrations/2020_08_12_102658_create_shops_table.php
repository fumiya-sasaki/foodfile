<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');//お店の名前
            $table->string('url');//url
            $table->string('genre');//ジャンル
            $table->string('image')->nullable();//画像
            $table->string('address')->nullable();
            $table->double('latitude')->nullable();//緯度
            $table->double('longitube')->nullable();//経度
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
        Schema::dropIfExists('shops');
    }
}
