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
        Schema::table('secretaires', function (Blueprint $table) {
            $table->string('matricule')->nullable()->unique()->after('telephone');
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->string('nom')->nullable()->after('user_id');
            $table->string('prenom')->nullable()->after('nom');
            $table->string('code')->nullable()->unique()->after('prenom');
        });

        Schema::table('medecins', function (Blueprint $table) {
            $table->string('nom')->nullable()->after('specialite_id');
            $table->string('prenom')->nullable()->after('nom');
            $table->string('mot_de_passe_unique')->nullable()->after('prenom');
            $table->boolean('est_chef')->default(false)->after('mot_de_passe_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medecins', function (Blueprint $table) {
            $table->dropColumn(['nom', 'prenom', 'mot_de_passe_unique', 'est_chef']);
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropColumn(['nom', 'prenom', 'code']);
        });

        Schema::table('secretaires', function (Blueprint $table) {
            $table->dropColumn('matricule');
        });
    }
};
