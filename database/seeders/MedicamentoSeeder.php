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
            ],
            [
                'referencia' => 1005,
                'nome' => 'Ibuprofeno',
                'preco' => 18.75,
                'descricao' => 'Anti-inflamatório não esteroidal',
                'forma' => 'Comprimido',
                'dosagem' => '600mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 90,
                'industria' => 'Eurofarma',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'referencia' => 1006,
                'nome' => 'Loratadina',
                'preco' => 22.90,
                'descricao' => 'Antialérgico de uso oral',
                'forma' => 'Comprimido',
                'dosagem' => '10mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 75,
                'industria' => 'Neo Química',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'referencia' => 1007,
                'nome' => 'Dexametasona',
                'preco' => 32.60,
                'descricao' => 'Corticosteroide para inflamações',
                'forma' => 'Creme',
                'dosagem' => '1mg/g',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 60,
                'industria' => 'EMS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'referencia' => 1008,
                'nome' => 'Metformina',
                'preco' => 28.90,
                'descricao' => 'Medicamento para diabetes tipo 2',
                'forma' => 'Comprimido',
                'dosagem' => '850mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 110,
                'industria' => 'Medley',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'referencia' => 1009,
                'nome' => 'Sertralina',
                'preco' => 55.75,
                'descricao' => 'Antidepressivo da classe ISRS',
                'forma' => 'Comprimido',
                'dosagem' => '50mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 40,
                'industria' => 'Eurofarma',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'referencia' => 1010,
                'nome' => 'Atenolol',
                'preco' => 19.90,
                'descricao' => 'Beta-bloqueador para hipertensão',
                'forma' => 'Comprimido',
                'dosagem' => '25mg',
                'imagem' => 'medicine-placeholder.svg',
                'quantidade' => 95,
                'industria' => 'Neo Química',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
