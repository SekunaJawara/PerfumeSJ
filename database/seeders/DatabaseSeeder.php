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
            'logo' => 'logos\lemaleelixir.jpg'
        ]);
        
        Perfume::create([
            'user_id' => $user->id,
            'Name' => 'Y EDP',
            'Brand' => 'Yves Saint Laurent',
            'Description' => 'Una fragancia fresca y moderna, con notas de bergamota, jengibre, manzana y madera de cedro.',
            'price' => 100.00,
            'notas_principales' => 'bergamota, jengibre, manzana, madera de cedro',
            'logo' => 'logos\YEDP.jpg'
        ]);

        Perfume::create([
            'user_id' => $user->id,
            'Name' => 'Qamrah',
            'Brand' => 'Lattafa',
            'Description' => 'Una fragancia oriental y opulenta, con notas de ámbar, vainilla, oud y especias cálidas.',
            'price' => 50.00,
            'notas_principales' => 'ámbar, vainilla, oud, especias cálidas',
            'logo' => 'logos\khamra.jpg'
        ]);
        
        Perfume::create([
            'user_id' => $user->id,
            'Name' => 'Sauvage',
            'Brand' => 'Dior',
            'Description' => 'Una fragancia fresca y audaz, con notas de bergamota, pimienta, lavanda y ambroxan.',
            'price' => 120.00,
            'notas_principales' => 'bergamota, pimienta, lavanda, ambroxan',
            'logo' => 'logos/sauvage.jpg'
        ]);
        
                



        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
