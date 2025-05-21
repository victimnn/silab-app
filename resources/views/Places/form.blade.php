@extends('layout')
@section('header')
    @include('partials.header')
@endsection

@section('content')
    
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h1 class="fw-bold text-center"><i class="fas fa-building me-2"></i> Novo Espaço</h1>
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="/places" class="btn btn-primary"><i class="fas fa-list-ul me-1"></i>Meus Espaços</a>
        </div>
        <form action="" method="POST" class=" " >
            @csrf
            @isset($place)
                @method('put')
            @endisset

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nome do Espaço</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{$place->name ?? null}}">
                <div class="invalid-feedback">Por favor, informe o nome do espaço.</div>
            </div>

            <div class="mb-3">
                <label for="capacity" class="form-label fw-semibold">Capacidade</label>
                <div class="input-group">
                    <input type="number" name="capacity" id="capacity" class="form-control" min="0" required value="{{$place->capacity ?? null}}">
                    <span class="input-group-text">pessoas</span>
                    <div class="invalid-feedback">Informe a capacidade do espaço.</div>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label fw-semibold">Descrição</label>
                <textarea name="description" id="description" cols="30" rows="6" class="form-control" required>{{$place->description ?? null}}</textarea>
                <div class="invalid-feedback">Por favor, forneça uma descrição para o espaço.</div>
            </div>
   
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i>Salvar</button>
                <button type="reset" class="btn btn-outline-secondary px-3"><i class="fas fa-eraser me-1"></i>Limpar</button>
            </div>
        </form>
    </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
        <div class="toast-header bg-success text-white">
            <i class="fas fa-check-circle me-2"></i>
            <strong class="me-auto">Sucesso!</strong>
            <small>Agora</small>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{session('success')}}
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 8px;
        border: none;
    }
    
    .card-header {
        border-radius: 8px 8px 0 0 !important;
    }
    
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }
</style>
@endsection

@section('scripts')
  <script src="{{asset('js/toast.js')}}"></script>
@endsection