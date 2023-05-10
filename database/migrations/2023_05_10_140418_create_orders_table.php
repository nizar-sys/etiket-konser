<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("event_id");
            $table->foreign("event_id")->references("id")->on("events")->onDelete("cascade")->cascadeOnUpdate();
            $table->string("nama_pemesan");
            $table->string("email_pemesan");
            $table->string("no_hp_pemesan");
            $table->integer("jumlah_tiket");
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
        Schema::dropIfExists('orders');
    }
};
