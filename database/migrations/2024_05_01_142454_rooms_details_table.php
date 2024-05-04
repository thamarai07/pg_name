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
        Schema::create('rooms_details', function (Blueprint $table) {
            $table->id();
            $table->string('building_name');
            $table->string('room_number');
            $table->string('slot_number');
            $table->string('advance_amount_for_the_slot');
            $table->string('rent_for_the_slot');
            $table->string('occupied_status');
            $table->string('eb_number_of_the_slot');
            $table->string('area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms_details');
    }
};
