@extends('layout')
@section('header')
    @include('partials.header')
@endsection

@section('content')
    
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h1 class="fw-bold text-center">🏢Novo Espaço</h1>
    </div>

    <div class="card-body">
        <form action="" method="POST">
            @csrf
            @isset($place)
                @method('put')
            @endisset

            <label for="">Nome do Espaço</label>
            <input type="text" name="name" id="" class="form-control" required value="{{$place->name ?? null}}">

            <label for="">Capacidade</label>
            <input type="number" name="capacity" id="" class="form-control" min="0" required value="{{$place->capacity ?? null}}">

            <label for="">Descrição</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{$place->description ?? null}}</textarea>
   
            <button type="submit" class="btn btn-primary mt-3">Enviar</button>
            <button type="reset" class="btn btn-secondary mt-3">Apagar</button>
        </form>
    </div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1500">
      <div class="toast-header">
        <strong class="me-auto">Sucesso!</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{session('success')}}
      </div>
    </div>
  </div>
  @endsection


@if (session('success') != null)
  @section('scripts')
  <script>
        const toastLiveExample = document.getElementById('liveToast')
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        toastBootstrap.show()
  </script>
  @endsection
@endif