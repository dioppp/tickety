<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained();
            $table->string('ticket_name');
            $table->string('ticket_description');
            $table->integer('price');
            $table->integer('stock');
            $table->date('sell_start_date');
            $table->date('sell_end_date');
            $table->time('sell_start_time');
            $table->time('sell_end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
