@extends('layouts.template_back')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Setores Cadastrados</h4>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($setores as $setor)
                <tr>
                    <td>{{ $setor->nome }}</td>
                    <td>{{ $setor->sigla }}</td>
                    <td>
                        <!-- botao para abrir o modal -->
                        <button class="btn btn-sm btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalDescricao{{ $setor->id }}">
                            Ver descrição
                        </button>
                    </td>
                </tr>

                <!-- Modal de descrição -->
                <div class="modal fade" id="modalDescricao{{ $setor->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">{{ $setor->nome }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">{{ $setor->descricao ?? 'Sem descrição cadastrada.' }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
