<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $complaints = [
            [
                'ticket_code' => 'TICKET-001',
                'reporter_name' => 'Budi Santoso',
                'reporter_contact' => '08123456789',
                'content' => 'Menu nasi goreng hari ini terlalu pedas untuk anak SD kelas 1.',
                'status' => 'pending',
                'created_at' => now()->subDays(2),
            ],
            [
                'ticket_code' => 'TICKET-002',
                'reporter_name' => 'Siti Aminah',
                'reporter_contact' => 'siti@example.com',
                'content' => 'Buah pisang yang disajikan hari ini banyak yang memar/busuk.',
                'status' => 'pending',
                'created_at' => now()->subDay(),
            ],
            [
                'ticket_code' => 'TICKET-003',
                'reporter_name' => 'Anonim',
                'reporter_contact' => '-',
                'content' => 'Mohon variasi menu diperbanyak, anak saya bosan ayam terus.',
                'status' => 'pending',
                'created_at' => now()->subHours(5),
            ],
            [
                'ticket_code' => 'TICKET-004',
                'reporter_name' => 'Kepala Sekolah SD 01',
                'reporter_contact' => '021-555555',
                'content' => 'Pengiriman makanan terlambat 30 menit hari ini.',
                'status' => 'pending',
                'created_at' => now()->subHours(2),
            ],
            [
                'ticket_code' => 'TICKET-005',
                'reporter_name' => 'Wali Murid Kelas 5',
                'reporter_contact' => '08987654321',
                'content' => 'Kotak makan yang digunakan kurang bersih, masih ada sisa minyak.',
                'status' => 'pending',
                'created_at' => now()->subMinutes(30),
            ],
        ];

        foreach ($complaints as $data) {
            Complaint::create($data);
        }
    }
}
