<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('reservations', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')
        ->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->foreignId('shop_id')
        ->constrained()
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->date('date');
      $table->time('time');
      $table->integer('number');
      $table->string('codename')->nullable();
      $table->boolean('visited')->nullable();
      $table->boolean('checkouted')->nullable();
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
    Schema::dropIfExists('reservations');
  }
}
