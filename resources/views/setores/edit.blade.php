@extends('layout')

@section('content')
<h4 class="text-success mb-3">Editar Setor</h4>
<form method="POST" action="{{ route('setores.update', $setor->id) }}" class="card p-3 shadow-sm">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" value="{{ $setor->nome }}" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Responsável</label>
    <input type="text" name="responsavel" value="{{ $setor->responsavel }}" class="form-control">
  </div>
  <div class="mb-3">
    <label>Descrição</label>
    <textarea name="descricao" class="form-control">{{ $setor->descricao }}</textarea>
  </div>
  <button class="btn btn-success">Atualizar</button>
  <a href="{{ route('setores.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
