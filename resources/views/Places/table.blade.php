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

                                <form action="/places/{{$place->id}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
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



@endsection