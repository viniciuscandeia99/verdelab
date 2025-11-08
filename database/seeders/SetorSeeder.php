<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setor;

class SetorSeeder extends Seeder
{
    public function run()
    {
        $setores = [
            [
                'nome' => 'Setor de Desenvolvimento',
                'descricao' => 'Responsável por desenvolver e manter sistemas internos e soluções digitais.',
                'responsavel' => 'Alexandre'
            ],
            [
                'nome' => 'Administração',
                'descricao' => 'Cuida da gestão financeira, compras e controle geral da organização.',
                'responsavel' => 'Mariana'
            ],
            [
                'nome' => 'Produção',
                'descricao' => 'Área voltada à fabricação e controle de produtos sustentáveis.',
                'responsavel' => 'Carlos'
            ],
            [
                'nome' => 'Limpeza e Manutenção',
                'descricao' => 'Executa tarefas de limpeza, coleta seletiva e manutenção predial.',
                'responsavel' => 'Fernanda'
            ],
            [
                'nome' => 'Reciclagem e Reuso',
                'descricao' => 'Gerencia resíduos e aplica técnicas de reuso de materiais.',
                'responsavel' => 'João Paulo'
            ],
        ];

        foreach ($setores as $setor) {
            Setor::create($setor);
        }
    }
}
