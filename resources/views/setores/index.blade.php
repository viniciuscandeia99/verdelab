@extends('layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
  <h4 class="text-success">Setores</h4>
  <a href="{{ route('setores.create') }}" class="btn btn-success btn-sm">+ Novo Setor</a>
</div>

<table class="table table-bordered bg-white shadow-sm">
  <thead class="table-success">
    <tr>
      <th>Nome</th>
      <th>Responsável</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($setores as $s)
      <tr>
        <td>{{ $s->nome }}</td>
        <td>{{ $s->responsavel }}</td>
        <td>
          <a href="{{ route('setores.edit', $s->id) }}" class="btn btn-primary btn-sm">Editar</a>
          <form action="{{ route('setores.destroy', $s->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir setor?')">Excluir</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
