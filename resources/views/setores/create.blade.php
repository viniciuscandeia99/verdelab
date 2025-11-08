@extends('layout')

@section('content')
<h4 class="text-success mb-3">Cadastrar Setor</h4>
<form method="POST" action="{{ route('setores.store') }}" class="card p-3 shadow-sm">
  @csrf
  <div class="mb-3">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Responsável</label>
    <input type="text" name="responsavel" class="form-control">
  </div>
  <div class="mb-3">
    <label>Descrição</label>
    <textarea name="descricao" class="form-control"></textarea>
  </div>
  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('setores.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
