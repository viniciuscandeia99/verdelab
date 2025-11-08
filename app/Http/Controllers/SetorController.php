<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setor::all();
        return view('setores.index', compact('setores'));
    }

    public function create()
    {
        return view('setores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
        ]);

        Setor::create($request->all());
        return redirect()->route('setores.index')->with('sucesso', 'Setor cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $setor = Setor::findOrFail($id);
        return view('setores.edit', compact('setor'));
    }

    public function update(Request $request, $id)
    {
        $setor = Setor::findOrFail($id);
        $setor->update($request->all());
        return redirect()->route('setores.index')->with('sucesso', 'Setor atualizado!');
    }

    public function destroy($id)
    {
        Setor::destroy($id);
        return redirect()->route('setores.index')->with('sucesso', 'Setor removido.');
    }
}
