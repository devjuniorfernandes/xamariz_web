<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeamMemberSeeder extends Seeder
{
    /**
     * Equipa da Xamariz, alinhada com a Knowledge Base "Quem Somos" 2026.
     *
     * As fotos vivem em public/equipa/<primeiro-nome>.jpg (nomes de ficheiro
     * curtos e sem acentos, para URLs seguros). Como o nome do ficheiro já não
     * contém a função, o nome completo, o cargo e o departamento são definidos
     * explicitamente no mapa abaixo (evita perder os cargos ao re-semear).
     *
     * A equipa existente é apagada e recriada a cada execução.
     */
    public function run(): void
    {
        TeamMember::query()->delete();

        // [ ficheiro em public/equipa, Nome completo, Função, Departamento ]
        // Departamentos: ceo | direction | specialist
        $members = [
            ['Edson',     'Edson Azevedo',       'Director Geral',                        'ceo'],
            ['Junior',    'Júnior Fernandes',    'Director de Arte',                      'direction'],
            ['Ernesto',   'Ernesto Longa',       'Coordenador de Operações',              'direction'],
            ['Adriano',   'Adriano Faria',       'Designer Gráfico',                      'specialist'],
            ['Claudio',   'Cláudio Gonçalves',   'Designer Gráfico',                      'specialist'],
            ['Agostinho', 'Agostinho Raimundo',  'Videomaker',                            'specialist'],
            ['Paulo',     'Paulo Ambrósio',      'Videomaker',                            'specialist'],
            ['Erickson',  'Erickson Lelo',       'Fotógrafo',                             'specialist'],
            ['Daniel',    'Daniel Samassumba',   'Web Designer',                          'specialist'],
            ['Isaias',    'Isaías Adão',         'Web Designer',                          'specialist'],
            ['Joelson',   'Joelson Fortunato',   'Web Designer',                          'specialist'],
            ['Benjamim',  'Benjamim Maiato',     'Gestor de Projectos Digitais',         'specialist'],
            ['Fredy',     'Fredy Yange',         'Gestor de Projectos Digitais',         'specialist'],
            ['Estefania', 'Estefânia António',   'Gestora de Projectos Digitais',        'specialist'],
            ['Julio',     'Júlio Adriano',       'Social Media',                          'specialist'],
            ['Anaureth',  'Anaureth Missula',    'Analista de Processos Internos',        'specialist'],
            ['Franio',    'Frânio António',      'Assistente Administrativo e Financeiro', 'specialist'],
        ];

        $edsonBio = implode("\n\n", [
            'Edson Azevedo é o fundador e Director Geral da Xamariz.',
            'A sua visão parte de uma convicção simples: empresas com valor nem sempre conseguem comunicar esse valor com a mesma clareza.',
            'Ao longo do seu percurso, desenvolveu uma abordagem que combina estratégia, criatividade e comunicação para transformar ideias complexas em mensagens que as pessoas conseguem compreender, valorizar e recordar.',
            'É essa forma de pensar que está na base da Xamariz: questionar antes de executar, procurar a diferença antes de comunicar e transformar clareza em impacto.',
            'Hoje, lidera a Xamariz com a ambição de construir uma empresa de comunicação capaz de ajudar organizações angolanas a comunicar ao nível daquilo que representam.',
        ]);

        $dir = public_path('equipa');
        $order = 1;

        foreach ($members as [$file, $name, $role, $department]) {
            // Encontra a foto (tolera .jpg/.jpeg/.png); se não existir, fica sem foto.
            $photo = null;
            foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                if (is_file($dir . '/' . $file . '.' . $ext)) {
                    $photo = 'equipa/' . $file . '.' . $ext;
                    break;
                }
            }

            TeamMember::create([
                'name'          => $name,
                'slug'          => Str::slug($name),
                'role'          => $role,
                'department'    => $department,
                'bio'           => $department === 'ceo' ? $edsonBio : null,
                'photo_path'    => $photo,
                'display_order' => $order++,
                'is_active'     => true,
            ]);
        }
    }
}
