@extends('layout')

@section('header')
    @include('partials.header')
@endsection

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row align-items-center mb-5">
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold mb-3">Agende seu espaço no SiLab</h1>
            <p class="lead text-muted mb-4">
                O sistema centralizado para reserva de laboratórios de informática, química, salas maker e bibliotecas. 
                Garanta seu horário e recursos com facilidade.
            </p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                @auth
                    <a href="/scheduling/new" class="btn btn-primary btn-lg px-4 me-md-2">
                        <i class="fas fa-calendar-plus me-2"></i>Novo Agendamento
                    </a>
                    <a href="/places" class="btn btn-outline-secondary btn-lg px-4">
                        <i class="fas fa-search me-2"></i>Ver Espaços
                    </a>
                @else
                    <a href="/login" class="btn btn-primary btn-lg px-4 me-md-2">
                        <i class="fas fa-sign-in-alt me-2"></i>Entrar
                    </a>
                    <a href="/register" class="btn btn-outline-primary btn-lg px-4">
                        <i class="fas fa-user-plus me-2"></i>Cadastrar-se
                    </a>
                @endauth
            </div>
        </div>
        <div class="col-lg-6 d-none d-lg-block text-center">
            <img src="https://img.freepik.com/free-vector/science-lab-concept-illustration_114360-1265.jpg" 
                 alt="Ilustração de Laboratório" 
                 class="img-fluid rounded-3 shadow-sm" 
                 style="max-height: 400px;">
        </div>
    </div>

    <!-- Features Section -->
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4">
        <div class="col">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                        <i class="fas fa-laptop-code fa-2x"></i>
                    </div>
                    <h3 class="fs-4">Informática</h3>
                    <p class="text-muted">Laboratórios equipados com computadores de alta performance para aulas e pesquisas.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-success bg-gradient text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                        <i class="fas fa-flask fa-2x"></i>
                    </div>
                    <h3 class="fs-4">Química</h3>
                    <p class="text-muted">Bancadas completas e equipamentos de segurança para experimentos práticos.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-warning bg-gradient text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                        <i class="fas fa-tools fa-2x"></i>
                    </div>
                    <h3 class="fs-4">Sala Maker</h3>
                    <p class="text-muted">Espaço criativo com impressoras 3D, ferramentas e materiais para prototipagem.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm hover-card">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-info bg-gradient text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 64px; height: 64px;">
                        <i class="fas fa-book fa-2x"></i>
                    </div>
                    <h3 class="fs-4">Biblioteca</h3>
                    <p class="text-muted">Salas de estudo em grupo e individuais, com ambiente silencioso e climatizado.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="row py-5 bg-light rounded-3 mt-4">
        <div class="col-md-12 text-center">
            <h2 class="mb-4">Como funciona?</h2>
        </div>
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <div class="display-6 text-primary mb-2">1</div>
            <h4 class="fw-bold">Escolha o Espaço</h4>
            <p class="text-muted px-3">Navegue pela lista de laboratórios e salas disponíveis no sistema.</p>
        </div>
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <div class="display-6 text-primary mb-2">2</div>
            <h4 class="fw-bold">Verifique a Disponibilidade</h4>
            <p class="text-muted px-3">Consulte o calendário para encontrar o melhor horário para sua atividade.</p>
        </div>
        <div class="col-md-4 text-center">
            <div class="display-6 text-primary mb-2">3</div>
            <h4 class="fw-bold">Confirme o Agendamento</h4>
            <p class="text-muted px-3">Finalize a reserva e receba a confirmação instantaneamente.</p>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .hover-card {
        transition: transform 0.3s ease-in-out;
    }
    .hover-card:hover {
        transform: translateY(-5px);
    }
    .feature-icon {
        font-size: 1.5rem;
    }
</style>
@endsection