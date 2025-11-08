@extends('layout')

@section('content')
<h4 class="text-success mb-3">Registrar Consumo</h4>

<form method="POST" action="{{ route('consumos.store') }}" class="card p-3 shadow-sm">
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

  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Mês</label>
      <input type="text" name="mes" class="form-control" placeholder="Ex: Janeiro" required>
    </div>
    <div class="col-md-6 mb-3">
      <label>Ano</label>
      <input type="number" name="ano" class="form-control" placeholder="Ex: 2025" required>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Energia (kWh)</label>
      <input type="number" step="0.01" name="energia_kwh" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
      <label>Água (Litros)</label>
      <input type="number" step="0.01" name="agua_litros" class="form-control" required>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Materiais (Kg)</label>
      <input type="number" step="0.01" name="materiais_kg" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
      <label>Produção (Unidades)</label>
      <input type="number" step="0.01" name="producao" class="form-control" required>
    </div>
  </div>

  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('consumos.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
