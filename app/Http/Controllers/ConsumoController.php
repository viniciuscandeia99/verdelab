<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\Setor;
use Illuminate\Http\Request;

class ConsumoController extends Controller
{
    public function index()
    {
        $consumos = Consumo::with('setor')->get();
        return view('consumos.index', compact('consumos'));
    }

    public function create()
    {
        $setores = Setor::all();
        return view('consumos.create', compact('setores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'setor_id' => 'required',
            'mes' => 'required',
            'ano' => 'required|numeric',
        ]);

        Consumo::create($request->all());
        return redirect()->route('consumos.index')->with('sucesso', 'Consumo registrado!');
    }

    public function edit($id)
    {
        $consumo = Consumo::findOrFail($id);
        $setores = Setor::all();
        return view('consumos.edit', compact('consumo', 'setores'));
    }

    public function update(Request $request, $id)
    {
        $consumo = Consumo::findOrFail($id);
        $consumo->update($request->all());
        return redirect()->route('consumos.index')->with('sucesso', 'Consumo atualizado!');
    }

    public function destroy($id)
    {
        Consumo::destroy($id);
        return redirect()->route('consumos.index')->with('sucesso', 'Consumo excluído.');
    }
}
