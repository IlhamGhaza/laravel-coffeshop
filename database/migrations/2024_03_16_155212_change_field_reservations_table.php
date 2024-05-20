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
        //
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('reservation_date')->after('reservation_code');
            $table->time('reservation_time')->after('reservation_date');
            $table->dropColumn('reservation_datetime');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dateTime('reservation_datetime')->after('reservation_code');
            $table->dropColumn('reservation_date');
            $table->dropColumn('reservation_time');
        });
    }
};
