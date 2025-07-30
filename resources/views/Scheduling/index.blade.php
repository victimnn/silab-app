@extends('layout')
@section('header')
    @include('partials.header')
@endsection

@section('content')
    
<div class="card shadow">
    <div class="card-header bg-primary text-white py-3">
        <h1 class="fw-bold text-center m-0"><i class="fas fa-calendar me-2"></i>Meus Agendamentos</h1>
    </div>

    <div class="card-body p-4">
        <div class="d-flex justify-content-end mb-4">
            <a href="/places/new" class="btn btn-primary px-3 py-2">
                <i class="fas fa-plus-circle me-2"></i>Novo Agendamento
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-light">
                   <tr>
                        <th>Aulas</th>
                        @forelse ($places as $place)
                            <th>{{ $place->name }}</th>
                        @empty
                            
                        @endforelse
                   </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1° - 07:10 as 08:00</td>
                        <td>Rubens</td>
                        <td><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Agendar</button></td>
                        <td><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Agendar</button></td>
                        <td>Fernando</td>
                        <td><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Agendar</button></td>
                    </tr>
                    <tr>
                        <td>2° - 08:00 as 08:50</td>
                        <td>Maria</td>
                        <td><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Agendar</button></td>
                    </tr>
                    <tr>
                        <td>3° - 09:00 as 09:40</td>
                    </tr>
                    <tr>
                        <td>4° - 10:00 as 10:50</td>
                    </tr>
                    <tr>
                        <td>5° - 11:00 as 11:40</td>
                    </tr>
                    <tr>
                        <td>6° - 12:00 as 12:30</td>
                    </tr>

                    <tr><td>7° - 13:00 as 13:50</td></tr>
                    <tr><td>8° - 14:00 as 14:40</td></tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
