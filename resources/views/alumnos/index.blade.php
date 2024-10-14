@extends('layout')
@section('titulo')
    - Registro de Alumnos
@endsection
@section('body')
<style>
    body {
        background: linear-gradient(135deg, #fff9c4 0%, #fffde7 100%);


    }
    
        .input-group-text {
        background-color: #fda085;
        color: #fff;
        border: none;
    
    }
    .btn-success {
        background-color: #e57373;
        border: none;
    }
    .btn-primary {
    background-color: #e57373; 
    border: none;
}

</style>
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario con iconos de Font Awesome y estilo mejorado -->
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Registrar usuario</h2>
            <form action="{{ route('alumnos.store') }}" method="POST">
                @csrf
                <!-- Campo de Nombre con icono -->
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
                </div>

                <!-- Campo de Número de teléfono con icono -->
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Número de teléfono" required>
                </div>

                <!-- Campo de Contraseña con icono -->
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="carrera" id="carrera" placeholder="Contraseña" required>
                </div>

                <!-- Campo de Fecha de Nacimiento con icono -->
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
                </div>

                <!-- Botón de Registrar más grande -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Registrar</button>
                </div>
            </form>
        </div>

        <!-- Botón secundario de Ver Formulario -->
        <div class="d-grid mt-4">
            <a href="{{ route('alumnos.create') }}" class="btn btn-primary btn-lg">Ver formulario de registro</a>
        </div>

    </div>
</div>
@endsection
