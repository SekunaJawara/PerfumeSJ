<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('perfumes', function (Blueprint $table) {
            // Notas olfativas
            $table->text('notas_salida')->nullable();
            $table->text('notas_corazon')->nullable();
            $table->text('notas_base')->nullable();

            // Inventario
            $table->integer('stock')->default(0);

            // Características del perfume
            $table->string('longevidad')->nullable(); // Corta, Media, Larga, Muy Larga
            $table->string('sillage')->nullable(); // Íntimo, Moderado, Fuerte
            $table->enum('genero', ['masculino', 'femenino', 'unisex'])->default('unisex');
            $table->string('edad_recomendada')->nullable(); // Joven, Adulto, Maduro, etc.

            // Recomendación por época del año (0-100)
            $table->smallInteger('recomendacion_primavera')->default(50);
            $table->smallInteger('recomendacion_verano')->default(50);
            $table->smallInteger('recomendacion_otono')->default(50);
            $table->smallInteger('recomendacion_invierno')->default(50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perfumes', function (Blueprint $table) {
            $table->dropColumn([
                'notas_salida',
                'notas_corazon',
                'notas_base',
                'stock',
                'longevidad',
                'sillage',
                'genero',
                'edad_recomendada',
                'recomendacion_primavera',
                'recomendacion_verano',
                'recomendacion_otono',
                'recomendacion_invierno'
            ]);
        });
    }
};
