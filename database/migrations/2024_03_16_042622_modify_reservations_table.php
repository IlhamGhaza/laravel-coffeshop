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
        Schema::table('reservations', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['customer_id']);

            // Drop existing column customer_id
            $table->dropColumn('customer_id');

            // Add new columns customer_name and customer_phone
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Drop new columns customer_name and customer_phone
            $table->dropColumn('customer_name');
            $table->dropColumn('customer_phone');

            // Add back customer_id column
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }
};
