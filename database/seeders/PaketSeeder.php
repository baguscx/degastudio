<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    public function run()
    {
        // Data untuk tipe Foto
        Paket::create([
            'tipe' => 'Foto',
            'nama' => 'Event',
            'harga' => 350000,
            'deskripsi' => 'Paket foto untuk event.',
        ]);

        Paket::create([
            'tipe' => 'Foto',
            'nama' => 'Engagement',
            'harga' => 350000,
            'deskripsi' => 'Paket foto untuk engagement.',
        ]);

        Paket::create([
            'tipe' => 'Foto',
            'nama' => 'Tedak Siten',
            'harga' => 350000,
            'deskripsi' => 'Paket foto untuk tedak siten.',
        ]);

        Paket::create([
            'tipe' => 'Foto',
            'nama' => 'Otomotif',
            'harga' => 350000,
            'deskripsi' => 'Paket foto untuk otomotif.',
        ]);

        Paket::create([
            'tipe' => 'Foto',
            'nama' => 'Family Time',
            'harga' => 350000,
            'deskripsi' => 'Paket foto untuk family time.',
        ]);

        // Data untuk tipe Video
        Paket::create([
            'tipe' => 'Video',
            'nama' => 'Cinematic',
            'harga' => 250000,
            'deskripsi' => 'Paket video cinematic.',
        ]);

        Paket::create([
            'tipe' => 'Video',
            'nama' => 'Rolling Video',
            'harga' => 250000,
            'deskripsi' => 'Paket rolling video.',
        ]);

        Paket::create([
            'tipe' => 'Video',
            'nama' => 'Otomotif',
            'harga' => 150000,
            'deskripsi' => 'Paket video untuk otomotif.',
        ]);

        // Data untuk tipe Bundling
        Paket::create([
            'tipe' => 'Bundling',
            'nama' => 'Foto Event + Cinematic',
            'harga' => 550000,
            'deskripsi' => 'Paket bundling foto event dan video cinematic.',
        ]);

        Paket::create([
            'tipe' => 'Bundling',
            'nama' => 'Foto Engagement + Cinematic',
            'harga' => 550000,
            'deskripsi' => 'Paket bundling foto engagement dan video cinematic.',
        ]);

        Paket::create([
            'tipe' => 'Bundling',
            'nama' => 'Foto Rolling + Cinematic',
            'harga' => 550000,
            'deskripsi' => 'Paket bundling foto rolling dan video cinematic.',
        ]);
    }
}
