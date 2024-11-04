<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicamento;
use Illuminate\Support\Facades\DB;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicamentos')->insert([
            [
                'referencia' => 1001,
                'nome' => 'Paracetamol',
                'preco' => 15.90,
                'descricao' => 'Analgésico e antitérmico para alívio de dores e febre',
                'forma' => 'Comprimido',
                'dosagem' => '750mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 100,
                'industria' => 'Medley',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'referencia' => 1002,
                'nome' => 'Dipirona',
                'preco' => 12.50,
                'descricao' => 'Medicamento para dor e febre',
                'forma' => 'Comprimido',
                'dosagem' => '500mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 80,
                'industria' => 'EMS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'referencia' => 1003,
                'nome' => 'Amoxicilina',
                'preco' => 45.90,
                'descricao' => 'Antibiótico de amplo espectro',
                'forma' => 'Cápsula',
                'dosagem' => '500mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 50,
                'industria' => 'Neo Química',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'referencia' => 1004,
                'nome' => 'Omeprazol',
                'preco' => 25.80,
                'descricao' => 'Medicamento para problemas gástricos',
                'forma' => 'Cápsula',
                'dosagem' => '20mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 120,
                'industria' => 'Medley',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
