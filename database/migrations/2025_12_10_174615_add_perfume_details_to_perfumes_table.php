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
            $table->text('notas_salida')->nullable()->after('notas_principales');
            $table->text('notas_corazon')->nullable()->after('notas_salida');
            $table->text('notas_base')->nullable()->after('notas_corazon');

            // Inventario
            $table->integer('stock')->default(0)->after('price');

            // Características del perfume
            $table->string('longevidad')->nullable()->after('stock'); // Corta, Media, Larga, Muy Larga
            $table->string('sillage')->nullable()->after('longevidad'); // Íntimo, Moderado, Fuerte
            $table->enum('genero', ['masculino', 'femenino', 'unisex'])->default('unisex')->after('sillage');
            $table->string('edad_recomendada')->nullable()->after('genero'); // Joven, Adulto, Maduro, etc.

            // Recomendación por época del año (0-100)
            $table->tinyInteger('recomendacion_primavera')->default(50)->after('edad_recomendada');
            $table->tinyInteger('recomendacion_verano')->default(50)->after('recomendacion_primavera');
            $table->tinyInteger('recomendacion_otono')->default(50)->after('recomendacion_verano');
            $table->tinyInteger('recomendacion_invierno')->default(50)->after('recomendacion_otono');
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
