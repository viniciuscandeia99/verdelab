@extends('layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h4 class="text-success">Consumos</h4>
  <a href="{{ route('consumos.create') }}" class="btn btn-success btn-sm">+ Novo Consumo</a>
</div>

<table class="table table-bordered bg-white shadow-sm">
  <thead class="table-success">
    <tr>
      <th>Setor</th>
      <th>Mês/Ano</th>
      <th>Energia (kWh)</th>
      <th>Água (L)</th>
      <th>Materiais (Kg)</th>
      <th>Produção</th>
      <th>Eficiência</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($consumos as $c)
      <tr>
        <td>{{ $c->setor->nome }}</td>
        <td>{{ $c->mes }}/{{ $c->ano }}</td>
        <td>{{ $c->energia_kwh }}</td>
        <td>{{ $c->agua_litros }}</td>
        <td>{{ $c->materiais_kg }}</td>
        <td>{{ $c->producao }}</td>
        <td>{{ $c->eficiencia }}</td>
        <td>
          <a href="{{ route('consumos.edit', $c->id) }}" class="btn btn-primary btn-sm">Editar</a>
          <form action="{{ route('consumos.destroy', $c->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir consumo?')">Excluir</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
