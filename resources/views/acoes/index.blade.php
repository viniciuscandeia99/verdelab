@extends('layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h4 class="text-success">Ações Sustentáveis</h4>
  <a href="{{ route('acoes.create') }}" class="btn btn-success btn-sm">+ Nova Ação</a>
</div>

<table class="table table-bordered bg-white shadow-sm">
  <thead class="table-success">
    <tr>
      <th>Título</th>
      <th>Setor</th>
      <th>Data</th>
      <th>Impacto</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($acoes as $a)
      <tr>
        <td>{{ $a->titulo }}</td>
        <td>{{ $a->setor->nome }}</td>
        <td>{{ $a->data_execucao }}</td>
        <td>{{ $a->impacto_estimado }}</td>
        <td>
          <a href="{{ route('acoes.edit', $a->id) }}" class="btn btn-primary btn-sm">Editar</a>
          <form action="{{ route('acoes.destroy', $a->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir ação?')">Excluir</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
