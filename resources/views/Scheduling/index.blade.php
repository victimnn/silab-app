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
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
    <div class="input-group" style="max-width: 400px;">
        <button class="btn btn-outline-secondary" type="button" aria-label="Dia anterior" id="prev-day-btn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="btn btn-outline-secondary" type="button" aria-label="Próximo dia" id="next-day-btn">
            <i class="fas fa-chevron-right"></i>
        </button>
        <button class="btn btn-outline-secondary" type="button" id="today-btn">Hoje</button>
        <label for="schedule-date" class="input-group-text bg-white border-end-0">Data</label>
        <input type="date" id="schedule-date" class="form-control" value="2025-08-06" aria-label="Selecionar data">
    </div>

    <a href="/places/new" class="btn btn-primary px-3 py-2 d-flex align-items-center gap-2">
        <i class="fas fa-plus-circle"></i>
        <span>Novo Agendamento</span>
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
                        <td>
                            <button class="btn btn-primary btn-sm btn-schedule" 
                            data-class-number="1"                            
                            data-shift="MANHA"
                            data-place-id="3"
                            >
                            <i class="fas fa-pencil-alt"></i> Agendar
                        </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2° - 08:00 as 08:50</td>
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

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btn-schedule');

        buttons.forEach(button => {
            button.addEventListener('click', async function() {
                const schedule = {
                    date: document.getElementById('schedule-date').value,
                    class_number: this.dataset.classNumber,
                    shift: this.dataset.shift,
                    place_id: this.dataset.placeId,
                    user_id: "1"
                };

                try {
                    const response = await fetch('/scheduling/new', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(schedule)
                    });
                    if (response.ok) {
                        // sucesso
                        alert('Agendamento realizado!');
                    } else {
                        // erro
                        console.error('Erro ao agendar');
                    }
                } catch (error) {
                    console.error('Erro de rede:', error);
                }
            });
        });
    });

    //logica para os botões de navegação de data

    let today = new Date();

    const dateInput = document.getElementById('schedule-date');
    document.getElementById('prev-day-btn').onclick = function() {
        let date = new Date(dateInput.value);
        date.setDate(date.getDate() - 1);
        dateInput.value = date.toISOString().slice(0,10);
    };
    document.getElementById('next-day-btn').onclick = function() {
        let date = new Date(dateInput.value);
        date.setDate(date.getDate() + 1);
        dateInput.value = date.toISOString().slice(0,10);
    };
    document.getElementById('today-btn').onclick = function() {
        dateInput.value = today.toISOString().slice(0,10);
    };

    window.onload = function() {
        document.getElementById("schedule-date").value = today.toISOString().slice(0,10);
    };
</script>
@endsection
