<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Perfume;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(5)->create();
        // Insertar los perfumes

        $user = User::factory()->create([
            'name' => 'Seku Jawara',
            'email' => 'seku@gmail.com'
        ]);
        Perfume::create([
            'user_id' => $user->id,
            'Name' => 'Le Male Elixir',
            'Brand' => 'Jean Paul Gaultier',
            'Description' => 'Una fragancia masculina intensa y seductora, con notas de menta, lavanda, vainilla y especias.',
            'price' => 120.00,
            'notas_principales' => 'menta, lavanda, vainilla, especias',
            'notas_salida' => 'menta, lavanda',
            'notas_corazon' => 'Vainilla, tonka bean',
            'notas_base' => 'jengibre, especias, oud',
            'stock' => 25,
            'longevidad' => 'Muy Larga',
            'sillage' => 'Fuerte',
            'genero' => 'masculino',
            'edad_recomendada' => 'Adulto',
            'recomendacion_primavera' => 40,
            'recomendacion_verano' => 20,
            'recomendacion_otono' => 80,
            'recomendacion_invierno' => 95,
            'logo' => 'logos\lemaleelixir.png'
        ]);

        Perfume::create([
            'user_id' => $user->id,
            'Name' => 'Y EDP',
            'Brand' => 'Yves Saint Laurent',
            'Description' => 'Una fragancia fresca y moderna, con notas de bergamota, jengibre, manzana y madera de cedro.',
            'price' => 100.00,
            'notas_principales' => 'bergamota, jengibre, manzana, madera de cedro',
            'notas_salida' => 'Bergamota italiana, manzana verde, jengibre',
            'notas_corazon' => 'Salvia, geranio, lavanda',
            'notas_base' => 'Madera de cedro, vetiver, olíbano',
            'stock' => 40,
            'longevidad' => 'Larga',
            'sillage' => 'Moderado',
            'genero' => 'masculino',
            'edad_recomendada' => 'Joven',
            'recomendacion_primavera' => 85,
            'recomendacion_verano' => 75,
            'recomendacion_otono' => 60,
            'recomendacion_invierno' => 45,
            'logo' => 'logos\YEDP.png'
        ]);

        Perfume::create([
            'user_id' => $user->id,
            'Name' => 'Qamrah',
            'Brand' => 'Lattafa',
            'Description' => 'Una fragancia oriental y opulenta, con notas de ámbar, vainilla, oud y especias cálidas.',
            'price' => 50.00,
            'notas_principales' => 'ámbar, vainilla, oud, especias cálidas',
            'notas_salida' => 'Canela, cardamomo, azafrán',
            'notas_corazon' => 'Praliné, vainilla, heliotropo',
            'notas_base' => 'Oud, ámbar, almizcle, sándalo',
            'stock' => 60,
            'longevidad' => 'Muy Larga',
            'sillage' => 'Fuerte',
            'genero' => 'unisex',
            'edad_recomendada' => 'Adulto',
            'recomendacion_primavera' => 30,
            'recomendacion_verano' => 15,
            'recomendacion_otono' => 90,
            'recomendacion_invierno' => 100,
            'logo' => 'logos\khamra.png'
        ]);

        Perfume::create([
            'user_id' => $user->id,
            'Name' => 'Sauvage',
            'Brand' => 'Dior',
            'Description' => 'Una fragancia fresca y audaz, con notas de bergamota, pimienta, lavanda y ambroxan.',
            'price' => 120.00,
            'notas_principales' => 'bergamota, pimienta, lavanda, ambroxan',
            'notas_salida' => 'Bergamota de Calabria, pimienta',
            'notas_corazon' => 'Pimienta de Sichuan, lavanda, pachulí',
            'notas_base' => 'Ambroxan, cedro, vetiver',
            'stock' => 35,
            'longevidad' => 'Larga',
            'sillage' => 'Fuerte',
            'genero' => 'masculino',
            'edad_recomendada' => 'Joven',
            'recomendacion_primavera' => 70,
            'recomendacion_verano' => 80,
            'recomendacion_otono' => 65,
            'recomendacion_invierno' => 50,
            'logo' => 'logos/sauvage.png'
        ]);





        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
