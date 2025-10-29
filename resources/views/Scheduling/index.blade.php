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
        <input type="date" id="schedule-date" class="form-control" value="{{ $date }}" min="{{ now()->toDateString() }}" aria-label="Selecionar data">
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
                    @foreach ($schedules as $class_number => $schedule)
                        <tr>
                            <td>{{ $class_number }}°</td>
                            @foreach ($places as $place)
                                @php $cell = $schedule[$place->id] @endphp
                                <td>
                                    @if(isset($cell->user))
                                        {{ $cell->user->name }}
                                    @else
                                        <button class="btn btn-primary btn-sm btn-schedule" 
                                            data-class-number="{{ $cell->class_number }}"                            
                                            data-shift="{{ $cell->shift }}"
                                            data-place-id="{{ $cell->place_id }}"
                                        >
                                            <i class="fas fa-pencil-alt"></i> Agendar
                                        </button>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
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
                    user_id: {{ Auth::id()}}
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
                        const data = await response.json();
                        // Update the button to show the user name
                        button.parentElement.innerHTML = data.user_name;
                        alert(data.success);
                    } else {
                        const errorData = await response.json();
                        alert(errorData.error || 'Erro ao agendar');
                    }
                } catch (error) {
                    console.error('Erro de rede:', error);
                }
            });
        });
    });

    //logica para os botões de navegação de data

    let today = new Date();
    let todayStr = today.toISOString().slice(0, 10);

    const dateInput = document.getElementById('schedule-date');
    document.getElementById('prev-day-btn').onclick = function() {
        let date = new Date(dateInput.value);
        date.setDate(date.getDate() - 1);
        let newDateStr = date.toISOString().slice(0, 10);
        if (newDateStr < todayStr) {
            alert('Não é possível selecionar datas passadas.');
            return;
        }
        dateInput.value = newDateStr;
        window.location.href = '/scheduling?date=' + dateInput.value;
    };
    document.getElementById('next-day-btn').onclick = function() {
        let date = new Date(dateInput.value);
        date.setDate(date.getDate() + 1);
        dateInput.value = date.toISOString().slice(0, 10);
        window.location.href = '/scheduling?date=' + dateInput.value;
    };
    document.getElementById('today-btn').onclick = function() {
        dateInput.value = todayStr;
        window.location.href = '/scheduling?date=' + dateInput.value;
    };

    dateInput.addEventListener('change', function() {
        if (this.value < todayStr) {
            alert('Não é possível selecionar datas passadas.');
            this.value = todayStr;
            return;
        }
        window.location.href = '/scheduling?date=' + this.value;
    });
</script>
@endsection
