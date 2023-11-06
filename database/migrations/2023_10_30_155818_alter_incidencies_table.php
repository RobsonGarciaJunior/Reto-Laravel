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
        Schema::table('incidencies', function (Blueprint $table) {
            $table->unsignedBigInteger('priorityId')->nullable();
            $table->foreign('priorityId')->references('id')->on('priorities')->onDelete('set null');
            $table->unsignedBigInteger('stateId')->nullable();
            $table->foreign('stateId')->references('id')->on('states')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('incidencies', function (Blueprint $table) {
            $table->dropForeign('priorityId');
            $table->dropColumn('priorityId');
            $table->dropForeign('stateId');
            $table->dropColumn('stateId');
        });
    }
};
