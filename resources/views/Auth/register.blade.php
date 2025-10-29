<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Conta | Silab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.0/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        .cover {
            background: linear-gradient(rgba(13, 110, 253, 0.8), rgba(13, 110, 253, 0.8)),
                        url('https://www.clickideia.com.br/blog/wp-content/uploads/2017/10/Fiap-aclimacao-lab-1-e1508848494124.jpg') 
                        no-repeat center center;
            background-size: cover;
            color: white;
            display: none;
        }

        .benefits-list {
            font-size: 1.15rem;
            line-height: 1.8;
            list-style: none;
            padding-left: 0;
        }

        .benefits-list li::before {
            content: '💡';
            margin-right: 10px;
            font-size: 1.4rem;
        }

        .title {
            display: none;
        }

        @media (min-width: 992px) {
            .cover {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 3rem;
            }
        }

        @media (max-width: 991px) {
            .title {
                display: block;
            }
        }
    </style>
  </head>
  <body>
    <div class="container-fluid" style="height: 100vh">
      <div class="row h-100">
        <!-- LADO ESQUERDO -->
        <div class="col-lg-7 cover">
          <h1 class="fw-bold display-4">Agendamento</h1>
          <h2 class="fw-medium fst-italic">"Organize seus horários, facilite seus estudos"</h2>
          <ul class="benefits-list mt-4 text-start">
            <li>Cadastre-se e comece a reservar laboratórios</li>
            <li>Evite conflitos de horários entre turmas</li>
            <li>Visualize e gerencie suas reservas com facilidade</li>
            <li>Interface moderna e intuitiva</li>
            <li>Segurança e controle para toda a comunidade escolar</li>
          </ul>
        </div>

        <!-- LADO DIREITO -->
        <div class="col-lg-5 d-flex align-items-center justify-content-center p-4">
          <div class="w-100" style="max-width: 400px;">
            <h1 class="fw-bold text-center text-primary display-1 pb-3 title">🔬 Silab</h1>
            <h2 class="fw-bold text-primary text-center">Crie sua conta</h2>

            @if($errors->any())
              <div class="alert alert-danger alert-dismissible fade show mt-3">
                <strong>Erro:</strong>
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif

            <form class="py-4" action="/register" method="POST">
              @csrf
              <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome Completo" value="{{ old('name') }}" required>
                <label for="name">Nome completo</label>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="nome@escola.com.br" value="{{ old('email') }}" required>
                <label for="email">E-mail institucional</label>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Senha" required>
                <label for="password">Senha</label>
                <div class="form-text">A senha deve possuir no mínimo 6 caracteres.</div>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-floating mb-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirme sua senha" required>
                <label for="password_confirmation">Confirme a senha</label>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <button type="submit" class="btn btn-lg btn-primary w-100">
                <i class="bi bi-person-plus"></i> Criar Conta
              </button>
            </form>

            <div class="text-center">
              <small>Já possui uma conta?</small>

              <a href="/login" class="text-decoration-none fw-semibold">Faça login aqui</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
 