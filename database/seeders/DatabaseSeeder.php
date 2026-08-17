<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Certificate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin (Domingo Isain - Owner & SEC Specialist)
        $admin = User::firstOrCreate(
            ['email' => 'domi@sellafugas.cl'],
            [
                'name' => 'Domingo Isain Plaza Caamaño',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '+56 9 4987 7316',
                'rut' => '12.738.961-6',
                'sec_code' => 'Gasfiter Certificado Autorizado SEC Clase 3',
                'is_active' => true,
            ]
        );

        // Also add secondary email alias for convenience
        User::firstOrCreate(
            ['email' => 'domi@instalgaschile.cl'],
            [
                'name' => 'Domingo Isain Plaza Caamaño',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '+56 9 4987 7316',
                'rut' => '12.738.961-6',
                'sec_code' => 'Gasfiter Certificado Autorizado SEC Clase 3',
                'is_active' => true,
            ]
        );

        // Admin Alvaro
        User::firstOrCreate(
            ['email' => 'alvaro@rew.cl'],
            [
                'name' => 'Álvaro',
                'password' => Hash::make('satorprogramador2021#'),
                'role' => 'admin',
                'phone' => '+56 9 4987 7316',
                'rut' => '19.170.098-8',
                'sec_code' => 'Gasfiter Certificado Autorizado SEC Clase 3',
                'is_active' => true,
            ]
        );

        // 2. Create Demo Technician
        $tech1 = User::firstOrCreate(
            ['email' => 'tecnico@sellafugas.cl'],
            [
                'name' => 'Carlos M. (Técnico Terreno)',
                'password' => Hash::make('tecnico123'),
                'role' => 'technician',
                'phone' => '+56 9 1234 5678',
                'rut' => '18.456.789-0',
                'sec_code' => 'Técnico Asistente',
                'is_active' => true,
            ]
        );

        // 3. Create Sample Client
        $client = Client::firstOrCreate(
            ['name' => 'Don Juan Pérez'],
            [
                'phone' => '+56 9 8888 7777',
                'address' => 'Nuestra Señora de Fatima 9530',
                'comuna' => 'La Florida',
                'provincia' => 'Santiago',
                'email' => 'donjuan@example.com',
            ]
        );

        // 4. Create Initial Certificate matching SellafuGas standard
        Certificate::firstOrCreate(
            ['certificate_number' => '14408'],
            [
                'document_type' => 'certificado',
                'date' => '2026-08-08',
                'user_id' => $admin->id,
                'client_id' => $client->id,
                'client_name' => 'Don Juan Pérez',
                'client_phone' => '+56 9 8888 7777',
                'client_address' => 'Nuestra Señora de Fatima 9530',
                'client_comuna' => 'La Florida',
                'client_provincia' => 'Santiago',
                'description' => 'Sellado de fugas de gas en red con Prodoral R6-1',
                'quantity' => 1,
                'unit_price' => 800000,
                'subtotal_neto' => 800000,
                'tax_type' => 'neto',
                'tax_amount' => 0,
                'total_price' => 800000,
                'items' => [
                    [
                        'description' => 'Sellado de fugas de gas no visibles en red interior con Prodoral R6-1 (30 metros lineales)',
                        'quantity' => 1,
                        'unit_price' => 800000
                    ]
                ],
                'work_details' => "Se realizó sellado de fuga de gas en red de 30 metros lineales aproximadamente.\n\nSe asegura hermeticidad de acuerdo al Decreto Supremo 66 Artículo 44.2.3 SEC. Se utilizó Prodoral R6-1 sellante alemán para Fugas de Gas aceptado por SEC DS66 artículo 7: DIN EN 13090 Y NAG-203.\n\nPrueba de hermeticidad final a 368 mmca estanco por 5 minutos, sin fugas.\nTiempo de ejecución menor a 2 horas. Garantía 3 años por efectos de sellado.\n\nResponsable Técnico: Domingo Isain Plaza Caamaño - RUT: 12.738.961-6\nGasfiter Certificado Autorizado SEC Clase 3",
                'gasfiter_name' => 'Domingo Isain Plaza Caamaño',
                'gasfiter_rut' => '12.738.961-6',
                'gasfiter_sec_class' => 'Gasfiter Certificado Autorizado SEC Clase 3',
                'photo_1' => null,
                'photo_2' => null,
                'photo_3' => null,
                'status' => 'emitido',
            ]
        );

        // 5. Call CertificateSeeder for additional realistic certificates & quotes
        $this->call(CertificateSeeder::class);
    }
}
