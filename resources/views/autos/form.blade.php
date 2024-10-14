@extends('layout')

@section('title')
    - @yield('formName')
@endsection

@section('body')
<style>
    body {
        background: linear-gradient(135deg, #fff9c4 0%, #fffde7 100%);
        font-family: 'Arial', sans-serif;
        color: #666;
    }

    .card {
        background: rgba(255, 255, 255, 0.8);
        border: none;
    }

    .input-group-text {
        background-color: #fda085;
        color: #fff;
        border: none;
    
    }
    .form-control:focus {
        border-color: #d3dce6;
        box-shadow: 0 0 10px rgba(211, 220, 230, 0.5);
    }

    .btn-success {
        background-color: #e57373;
        border: none;
    }

    .btn-success:hover {
        background-color: #eef1f5;
    }

    .btn-primary {
        background-color: #e57373;
        border: none;
    }

    .btn-primary:hover {
        background-color: #e57373;
    }
</style>
    <!-- Mostrar errores de validación -->
    @if($errors->any())    
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <p><b><i class="fa-solid fa-times"></i>Errores</b></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>                   
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Formulario general -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">@yield('formName')</div>
                <div class="card-body">
                    <form @yield('action') method="post" enctype="multipart/form-data">
                        @yield('method') <!-- Esto es para PUT (en edición) -->
                        @csrf <!-- Token de protección contra CSRF -->
                        
                        <!-- Nombre del coche -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre"
                            @isset($auto) value="{{ $auto->nombre }}" @endisset required>
                        </div>

                        <!-- Características del coche -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                            <input type="text" name="caracteristicas" class="form-control" placeholder="Características"
                            @isset($auto) value="{{ $auto->caracteristicas }}" @endisset required>
                        </div>

                        <!-- Precio del coche -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                            <input type="text" name="precio" class="form-control" placeholder="Precio"
                            @isset($auto) value="{{ $auto->precio }}" @endisset required>
                        </div>

                        <!-- Imagen del coche -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="file" name="imagen" class="form-control" 
                                   @if(!isset($auto)) required @endif accept="image/*">
                        </div>

                        <!-- Botón para enviar el formulario -->
                        <button class="btn btn-success" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
