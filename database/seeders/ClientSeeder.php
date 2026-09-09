<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Cadastra os clientes a partir dos logótipos em public/clientes.
     * O nome do ficheiro é o nome da marca. A lista existente é apagada
     * e recriada a cada execução (works ficam com client_id null — nullOnDelete).
     */
    public function run(): void
    {
        Client::query()->delete();

        $dir = public_path('clientes');

        $files = array_merge(
            glob($dir . '/*.png') ?: [],
            glob($dir . '/*.jpg') ?: [],
            glob($dir . '/*.jpeg') ?: [],
            glob($dir . '/*.svg') ?: [],
        );
        sort($files, SORT_NATURAL | SORT_FLAG_CASE);

        $order = 1;
        foreach ($files as $file) {
            $filename = basename($file);
            $name = pathinfo($filename, PATHINFO_FILENAME);

            // Limpar artefactos de exportação (ex.: "SLBPrancheta 1" -> "SLB")
            $name = preg_replace('/\s*Prancheta\s*\d*/i', '', $name);
            $name = trim(preg_replace('/\s+/', ' ', $name));

            Client::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'logo_path' => 'clientes/' . $filename,
                'show_in_marquee' => true,
                'display_order' => $order++,
            ]);
        }
    }
}
