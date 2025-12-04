<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SiLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --text-dark: #2b2d42;
            --text-light: #8d99ae;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            overflow-x: hidden;
        }
        
        .login-container {
            min-height: 100vh;
        }

        /* Left Side - Image & Branding */
        .brand-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            position: relative;
            overflow: hidden;
        }

        .brand-bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=2572&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            opacity: 0.15;
            mix-blend-mode: overlay;
        }

        .brand-content {
            position: relative;
            z-index: 2;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        .feature-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        /* Right Side - Form */
        .form-section {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
            animation: slideUp 0.6s ease-out;
        }

        .form-floating > .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            height: 3.5rem;
            padding-left: 1rem;
            transition: all 0.3s ease;
        }

        .form-floating > .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }

        .form-floating > label {
            padding-left: 1rem;
            color: var(--text-light);
        }

        .btn-login {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            padding: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-light);
            z-index: 10;
            background: none;
            border: none;
            padding: 0;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: var(--text-light);
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e9ecef;
        }

        .divider span {
            padding: 0 10px;
            font-size: 0.85rem;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating shapes for background interest */
        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }
        .shape-1 { width: 300px; height: 300px; top: -50px; right: -50px; }
        .shape-2 { width: 200px; height: 200px; bottom: 50px; left: -50px; }

    </style>
  </head>
  <body>
    <div class="container-fluid login-container">
      <div class="row h-100 min-vh-100">
        
        <!-- Left Side: Brand & Info -->
        <div class="col-lg-6 col-xl-7 d-none d-lg-flex flex-column justify-content-center align-items-center brand-section text-white p-5">
            <div class="brand-bg-image"></div>
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            
            <div class="brand-content text-center text-lg-start" style="max-width: 600px;">
                <div class="mb-5">
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill mb-3 fw-bold shadow-sm">v2.0 Beta</span>
                    <h1 class="display-3 fw-bold mb-3">SiLab</h1>
                    <p class="lead opacity-75">Sistema Integrado de Laboratórios e Ambientes</p>
                </div>

                <div class="glass-card mt-5">
                    <h4 class="mb-4 fw-bold">Por que usar o SiLab?</h4>
                    <div class="feature-item">
                        <div class="feature-icon"><i class="bi bi-calendar-check"></i></div>
                        <span>Agendamento rápido e sem burocracia</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon"><i class="bi bi-clock-history"></i></div>
                        <span>Histórico completo de suas reservas</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
                        <span>Segurança e controle de acesso</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon"><i class="bi bi-laptop"></i></div>
                        <span>Gestão de recursos e equipamentos</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="col-lg-6 col-xl-5 form-section">
            <div class="login-card">
                <div class="text-center mb-5">
                    <div class="d-lg-none mb-4">
                        <h1 class="fw-bold text-primary">SiLab</h1>
                    </div>
                    <h2 class="fw-bold text-dark mb-2">Bem-vindo de volta!</h2>
                    <p class="text-muted">Insira suas credenciais para acessar sua conta.</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-circle-fill fs-4 me-3"></i>
                        <div>
                            <div class="fw-bold">Erro de Autenticação</div>
                            <small>{{ $errors->first() }}</small>
                        </div>
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email">E-mail Institucional</label>
                    </div>

                    <div class="form-floating mb-2 position-relative">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Senha</label>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="bi bi-eye" id="toggleIcon"></i>
                        </button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                            <label class="form-check-label text-muted small" for="remember">
                                Lembrar de mim
                            </label>
                        </div>
                        <a href="#" class="text-decoration-none small fw-semibold" style="color: var(--primary-color);">Esqueceu a senha?</a>
                    </div>

                    <button type="submit" class="btn btn-primary btn-login w-100 mb-4">
                        Entrar no Sistema
                    </button>

                    <div class="divider">
                        <span>OU</span>
                    </div>

                    <div class="text-center">
                        <p class="text-muted mb-0">Ainda não tem uma conta?</p>
                        <a href="/register" class="fw-bold text-decoration-none" style="color: var(--secondary-color);">Criar nova conta</a>
                    </div>
                </form>
                
                <div class="text-center mt-5 text-muted small">
                    &copy; {{ date('Y') }} SiLab. Todos os direitos reservados.
                </div>
            </div>
        </div>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }
    </script>
  </body>
</html>
 