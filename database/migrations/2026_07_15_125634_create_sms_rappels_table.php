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
         Schema::create('sms_rappels', function (Blueprint $table) {
        $table->id();

        $table->foreignId('patient_id')
              ->constrained()
              ->onDelete('cascade');

        $table->text('message');

        $table->dateTime('date_envoi');

        $table->string('statut');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_rappels');
    }
};
