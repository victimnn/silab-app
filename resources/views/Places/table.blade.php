@extends('layout')
@section('header')
    @include('partials.header')
@endsection

@section('content')
    
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h1 class="fw-bold text-center">Meus Espaços</h1>
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="/places/new" class="btn btn-primary">+ Novo Espaço</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Capacidade</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($places as $place)
                    <tr class="align-itens-center">
                        <td>{{ $place->id }}</td>
                        <td>{{ $place->name }}</td>
                        <td>{{ $place->capacity }}</td>
                        <td>{{ $place->description }}</td>
                        <td class="d-flex gap-1">
                            <a href="/places/{{$place->id}}/edit" class="btn btn-secondary">Editar</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationModal" data-place-id="{{ $place->id }}">
                                    Excluir
                                </button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                           <h3><i class="fa-light fa-trowel"></i>Nenhum espaço cadastrado</h3> 
                           <p>Para cadastar um novo espaço <a href="/places/new">clique aqui!</a></p>
                        </td>
                    </tr>  
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5 fw-bold" id="confirmationModalLabel">🚨Alerta</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                Confirmar Exclusão?
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btnVoltar">Voltar</button>
                    <form id="deletePlaceForm" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </button>
                </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
    <script>
        const confirmationModal = document.getElementById('confirmationModal')
        const form = document.getElementById('deletePlaceForm')
        const btnVoltar = document.getElementById('btnVoltar')

        confirmationModal.addEventListener('show.bs.modal', (event) => {
            btnVoltar.focus()

            const id = (event.relatedTarget.getAttribute('data-place-id'));

            form.action = `/places/${id}`
        })
    </script>

@endsection