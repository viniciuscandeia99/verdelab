<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Consumo;
use App\Models\Acao;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSetores = Setor::count();
        $totalConsumos = Consumo::count();
        $totalAcoes = Acao::count();

        $dadosConsumo = Consumo::selectRaw('mes, SUM(energia_kwh) as energia, SUM(agua_litros) as agua, SUM(materiais_kg) as materiais')
            ->groupBy('mes')
            ->get();

        return view('dashboard', compact('totalSetores', 'totalConsumos', 'totalAcoes', 'dadosConsumo'));
    }
}
