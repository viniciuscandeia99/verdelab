@extends('layout')

@section('content')
<h4 class="text-success mb-3">Cadastrar Ação Sustentável</h4>

<form method="POST" action="{{ route('acoes.store') }}" class="card p-3 shadow-sm">
  @csrf
  <div class="mb-3">
    <label>Setor</label>
    <select name="setor_id" class="form-select" required>
      <option value="">Selecione...</option>
      @foreach($setores as $setor)
        <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label>Título da Ação</label>
    <input type="text" name="titulo" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Descrição</label>
    <textarea name="descricao" class="form-control" rows="4"></textarea>
  </div>

  <div class="mb-3">
    <label>Data de Execução</label>
    <input type="date" name="data_execucao" class="form-control">
  </div>

  <div class="mb-3">
    <label>Impacto Estimado</label>
    <input type="text" name="impacto_estimado" class="form-control" placeholder="Ex: redução de 15% no consumo de energia">
  </div>

  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('acoes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
