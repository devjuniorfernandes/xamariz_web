<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeamMemberSeeder extends Seeder
{
    /**
     * Cadastra os membros da equipa a partir das fotos em public/equipa.
     * Cada ficheiro tem o formato "Nome - Função.jpg".
     * A equipa existente é apagada e recriada a cada execução.
     */
    public function run(): void
    {
        // Apagar equipa existente e recriar a partir das fotos
        TeamMember::query()->delete();

        $dir = public_path('equipa');

        $files = array_merge(
            glob($dir . '/*.jpg') ?: [],
            glob($dir . '/*.jpeg') ?: [],
            glob($dir . '/*.png') ?: [],
        );
        sort($files, SORT_NATURAL | SORT_FLAG_CASE);

        $edsonBio = implode("\n\n", [
            'Edson Azevedo é o fundador e Director Geral da Xamariz.',
            'A sua visão parte de uma convicção simples: empresas com valor nem sempre conseguem comunicar esse valor com a mesma clareza.',
            'Ao longo do seu percurso, desenvolveu uma abordagem que combina estratégia, criatividade e comunicação para transformar ideias complexas em mensagens que as pessoas conseguem compreender, valorizar e recordar.',
            'É essa forma de pensar que está na base da Xamariz: questionar antes de executar, procurar a diferença antes de comunicar e transformar clareza em impacto.',
            'Hoje, lidera a Xamariz com a ambição de construir uma empresa de comunicação capaz de ajudar organizações angolanas a comunicar ao nível daquilo que representam.',
        ]);

        $order = 2; // Edson (CEO) fica em 1º

        foreach ($files as $file) {
            $filename = basename($file);
            $base = pathinfo($filename, PATHINFO_FILENAME); // "Nome - Função"

            // Separa "Nome - Função" (tolera "Nome -Função" / "Nome- Função")
            $parts = preg_split('/\s*-\s*/', $base, 2);
            $name = trim($parts[0] ?? $base);
            $role = trim($parts[1] ?? '');

            $isEdson = Str::startsWith(Str::lower($name), 'edson');
            if ($isEdson) {
                $role = 'Director Geral';
            }

            $department = $isEdson
                ? 'ceo'
                : (Str::contains($role, ['Director', 'Diretor', 'Coordenador']) ? 'direction' : 'specialist');

            TeamMember::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'role' => $role,
                'department' => $department,
                'bio' => $isEdson ? $edsonBio : null,
                'photo_path' => 'equipa/' . $filename,
                'display_order' => $isEdson ? 1 : $order++,
                'is_active' => true,
            ]);
        }
    }
}
