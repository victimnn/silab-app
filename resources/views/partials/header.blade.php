<!-- Arquivo: resources/views/partials/header.blade.php -->

<div class="container">
  <div class="header-content">
    <div class="d-flex align-items-center mb-3 mb-md-0">
      <a href="/" class="text-decoration-none text-white">
        <h1 class="site-title">Silab</h1>
      </a>
        <span class="ms-2 badge bg-light text-primary">Beta</span>
    </div>
    
    <nav class="navbar navbar-expand-lg">
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('/') ? 'active' : '' }}" href="/"><i class="fas fa-home"></i>Início</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle {{ request()->is('places*') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-map-marker-alt"></i>Espaços
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/places/new">Novo Espaço</a></li>
              <li><a class="dropdown-item" href="/places">Meus Espaços</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white dropdown-toggle {{ request()->is('bookings*') ? 'active' : '' }}" href="#" id="bookingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-calendar-alt"></i>Agendamentos
            </a>
            <ul class="dropdown-menu" aria-labelledby="bookingsDropdown">
              <li><a class="dropdown-item" href="/scheduling/new">Novo Agendamento</a></li>
              <li><a class="dropdown-item" href="/scheduling">Meus Agendamentos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/scheduling/history">Histórico</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('reports*') ? 'active' : '' }}" href="/reports"><i class="fas fa-chart-bar"></i>Relatórios</a>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="user-actions">
      @auth
        <div class="dropdown">
          <button class="btn btn-login text-white dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="/profile"><i class="fas fa-id-card me-2"></i>Meu Perfil</a></li>
            <li><a class="dropdown-item" href="/settings"><i class="fas fa-cog me-2"></i>Configurações</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Sair</button>
              </form>
            </li>
          </ul>
        </div>
      @else
        <a href="/login" class="btn btn-login text-white me-2">Entrar</a>
        <a href="/register" class="btn btn-register">Cadastrar</a>
      @endauth
    </div>
  </div>
</div>

