@extends('layout')
@section('header')
    @include('partials.header')
@endsection

@section('content')
    
<div class="card shadow">
    <div class="card-header bg-primary text-white py-3">
        <h1 class="fw-bold text-center m-0"><i class="fas fa-building me-2"></i>Meus Espaços</h1>
    </div>

    <div class="card-body p-4">
        <div class="d-flex justify-content-end mb-4">
            <a href="/places/new" class="btn btn-primary px-3 py-2">
                <i class="fas fa-plus-circle me-2"></i>Novo Espaço
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nome</th>
                        <th class="text-center">Capacidade</th>
                        <th>Descrição</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($places as $place)
                        <tr>
                            <td class="text-center fw-bold">{{ $place->id }}</td>
                            <td class="fw-semibold">{{ $place->name }}</td>
                            <td class="text-center">
                                <span class="badge bg-info text-dark px-3 py-2">
                                    <i class="fas fa-users me-1"></i> {{ $place->capacity }}
                                </span>
                            </td>
                            <td>{{ Str::limit($place->description, 50) }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="/places/{{$place->id}}/edit" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#confirmationModal" 
                                            data-place-id="{{ $place->id }}">
                                        <i class="fas fa-trash-alt me-1"></i>Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-clipboard-list empty-icon mb-3"></i>
                                    <h3 class="fw-bold">Nenhum espaço cadastrado</h3> 
                                    <p class="text-muted">Para cadastrar um novo espaço 
                                        <a href="/places/new" class="link-primary">clique aqui!</a>
                                    </p>
                                </div>
                            </td>
                        </tr>  
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5 fw-bold" id="confirmationModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirmar Exclusão
                </h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <p class="mb-0">Tem certeza que deseja excluir este espaço? Esta ação não pode ser desfeita.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnVoltar">
                    <i class="fas fa-arrow-left me-1"></i>Cancelar
                </button>
                <form id="deletePlaceForm" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i>Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 10px;
        border: none;
        overflow: hidden;
    }
    
    .card-header {
        border-bottom: 0;
    }
    
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    
    .empty-state {
        padding: 30px;
    }
    
    .empty-icon {
        font-size: 3rem;
        color: #c9c9c9;
        display: block;
    }
    
    .btn {
        border-radius: 5px;
        font-weight: 500;
    }
    
    .badge {
        font-weight: 500;
        border-radius: 6px;
    }
</style>
@endsection

@section('scripts')
    <script src="{{asset('js/confirmationModal.js')}}"></script>
        
    </script>
@endsection