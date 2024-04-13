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
            Schema::table('events', function (Blueprint $table) {
                // Add a new column 'created_by' to store the user id
                $table->unsignedBigInteger('created_by');
    
                // Define a foreign key constraint
                $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('events', function (Blueprint $table) {
                // Drop the 'created_by' column and foreign key constraint
                $table->dropForeign(['created_by']);
                $table->dropColumn('created_by');
        });
    }
};
