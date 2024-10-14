@extends('layout')
@section('titulo')
    - Editar Alumno
@endsection
@section('body')
<style>

    .card {
        background: rgba(255, 255, 255, 0.8);
        border: none;
    }

    .input-group-text {
        background-color: #fda085;
        color: #000000;
        border: none;
    }

    .btn-dark {
        background-color: #424242;
        border: none;
    }

    .btn-dark:hover {
        background-color: #ff0000;
    }
    </style>
    <div class="row mt-3">
        <form action="{{ route('alumnos.update', $alumno) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-person"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre" value="{{ $alumno->nombre }}">
                        <label for="nombre">Nombre</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="matricula" id="matricula" placeholder="numero de telefono" value="{{ $alumno->matricula }}">
                        <label for="matricula">Numero de telefono</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="carrera" id="carrera" placeholder="contraseña" value="{{ $alumno->carrera }}">
                        <label for="carrera">contraseña</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <div class="form-floating">
                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <button class="btn btn-dark">Guardar</button>
            </div>
        </form>
    </div>
@endsection
