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
        Schema::create('building', function (Blueprint $table) {
            $table->id();
            $table->string('building_name');
            $table->string('building_no');
            $table->string('building_street');
            $table->string('area_name');
            $table->string('building_owner_name');
            $table->string('building_owner_contact_number');
            $table->string('no_of_contract_year');
            $table->string('contract_year_from');
            $table->string('contract_year_to');
            $table->string('number_of_rooms_in_building');
            $table->string('eb_number');
            $table->string('monthly_rent_of_building');
            $table->string('advance_amount_for_building');
            $table->string('due_in_advance_from_us_to_building_owner');
            $table->string('building_contact_number');
            $table->string("date_for_pay_rent_to_owner");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('building');
    }
};
