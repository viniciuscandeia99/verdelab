<?php

namespace App\Http\Controllers;

use App\Models\Acao;
use App\Models\Setor;
use Illuminate\Http\Request;

class AcaoController extends Controller
{
    public function index()
    {
        $acoes = Acao::with('setor')->get();
        return view('acoes.index', compact('acoes'));
    }

    public function create()
    {
        $setores = Setor::all();
        return view('acoes.create', compact('setores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'setor_id' => 'required',
            'titulo' => 'required',
        ]);

        Acao::create($request->all());
        return redirect()->route('acoes.index')->with('sucesso', 'Ação registrada com sucesso!');
    }

    public function edit($id)
    {
        $acao = Acao::findOrFail($id);
        $setores = Setor::all();
        return view('acoes.edit', compact('acao', 'setores'));
    }

    public function update(Request $request, $id)
    {
        $acao = Acao::findOrFail($id);
        $acao->update($request->all());
        return redirect()->route('acoes.index')->with('sucesso', 'Ação atualizada!');
    }

    public function destroy($id)
    {
        Acao::destroy($id);
        return redirect()->route('acoes.index')->with('sucesso', 'Ação excluída.');
    }
}
