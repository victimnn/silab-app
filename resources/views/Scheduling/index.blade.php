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
        <span>Criar Espaço</span>
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
                                        <div class="d-flex flex-column gap-1">
                                            <span class="fw-semibold text-break">{{ $cell->user->name }}</span>
                                            @if($cell->user_id === Auth::id())
                                                <button class="btn btn-danger btn-sm btn-unschedule w-100" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#unscheduleModal"
                                                    data-schedule-id="{{ $cell->id }}"
                                                    data-class-number="{{ $cell->class_number }}"
                                                    data-place-id="{{ $cell->place_id }}"
                                                    data-place-name="{{ $place->name }}"
                                                >
                                                    <i class="fas fa-times"></i> <span class="d-none d-md-inline">Desagendar</span>
                                                </button>
                                            @endif
                                        </div>
                                    @else
                                        <button class="btn btn-primary btn-sm btn-schedule w-100" 
                                            data-class-number="{{ $cell->class_number }}"                            
                                            data-shift="{{ $cell->shift }}"
                                            data-place-id="{{ $cell->place_id }}"
                                        >
                                            <i class="fas fa-pencil-alt"></i> <span class="d-none d-md-inline">Agendar</span>
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

<!-- Modal de Confirmação de Desagendamento -->
<div class="modal fade" id="unscheduleModal" tabindex="-1" aria-labelledby="unscheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5 fw-bold" id="unscheduleModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirmar Cancelamento
                </h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <p class="mb-0">Tem certeza que deseja cancelar este agendamento?</p>
                <div class="mt-3 p-3 bg-light rounded">
                    <p class="mb-1"><strong>Aula:</strong> <span id="modal-class-number"></span>°</p>
                    <p class="mb-1"><strong>Local:</strong> <span id="modal-place-name"></span></p>
                    <p class="mb-0"><strong>Data:</strong> <span id="modal-date"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCancelar">
                    <i class="fas fa-arrow-left me-1"></i>Voltar
                </button>
                <button type="button" class="btn btn-danger" id="btnConfirmarDesagendar">
                    <i class="fas fa-times me-1"></i>Confirmar Cancelamento
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        // Schedule functionality
        const scheduleButtons = document.querySelectorAll('.btn-schedule');

        scheduleButtons.forEach(button => {
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
                        window.location.reload();
                    } else {
                        const errorData = await response.json();
                        showToast(errorData.error || 'Erro ao agendar', 'danger');
                    }
                } catch (error) {
                    console.error('Erro de rede:', error);
                    showToast('Erro ao agendar. Tente novamente.', 'danger');
                }
            });
        });

        // Unschedule Modal functionality
        const unscheduleModal = document.getElementById('unscheduleModal');
        const btnConfirmarDesagendar = document.getElementById('btnConfirmarDesagendar');
        const btnCancelar = document.getElementById('btnCancelar');
        let currentScheduleId = null;

        unscheduleModal.addEventListener('show.bs.modal', (event) => {
            btnCancelar.focus();
            const button = event.relatedTarget;
            currentScheduleId = button.getAttribute('data-schedule-id');
            const classNumber = button.getAttribute('data-class-number');
            const placeName = button.getAttribute('data-place-name');
            const date = document.getElementById('schedule-date').value;
            
            // Formatar data para exibição
            const [year, month, day] = date.split('-');
            const formattedDate = `${day}/${month}/${year}`;

            // Preencher informações no modal
            document.getElementById('modal-class-number').textContent = classNumber;
            document.getElementById('modal-place-name').textContent = placeName;
            document.getElementById('modal-date').textContent = formattedDate;
        });

        btnConfirmarDesagendar.addEventListener('click', async function() {
            if (!currentScheduleId) return;

            try {
                const response = await fetch(`/scheduling/${currentScheduleId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    bootstrap.Modal.getInstance(unscheduleModal).hide();
                    window.location.reload();
                } else {
                    const errorData = await response.json();
                    bootstrap.Modal.getInstance(unscheduleModal).hide();
                    showToast(errorData.error || 'Erro ao desagendar', 'danger');
                }
            } catch (error) {
                console.error('Erro de rede:', error);
                bootstrap.Modal.getInstance(unscheduleModal).hide();
                showToast('Erro ao desagendar. Tente novamente.', 'danger');
            }
        });

        // Toast notification function
        function showToast(message, type = 'success') {
            const toastContainer = document.querySelector('.toast-container') || createToastContainer();
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white bg-${type} border-0`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;
            toastContainer.appendChild(toast);
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            toast.addEventListener('hidden.bs.toast', () => toast.remove());
        }

        function createToastContainer() {
            const container = document.createElement('div');
            container.className = 'toast-container position-fixed top-0 end-0 p-3';
            container.style.zIndex = '9999';
            document.body.appendChild(container);
            return container;
        }
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
