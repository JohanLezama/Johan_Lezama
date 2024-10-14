@extends('layout')
@section('titulo')
    -Editar {}
    @endsection
    @section('body')
        <div class="row mt-3">
            <form action="{{route('alumnos.update',$alumno)}}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-person"></i></span>
                        <div class="form-floating">
                          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre" value="{{$alumno->nombre}}">
                          <label for="nombre">Nombre</label>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                        <div class="form-floating">
                          <input type="text" class="form-control" name="matricula" id="matricula" placeholder="matricula" value="{{$alumno->matricula}}">
                          <label for="matricula">Matricula</label>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                        <div class="form-floating">
                          <input type="text" class="form-control" name="carrera" id="carrera" placeholder="carrera" value="{{$alumno->carrera}}">
                          <label for="carrera">Carrera</label>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-cake-candles"></i></span>
                        <div class="form-floating">
                          <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="fecha_nacimiento" value="{{$alumno->fecha_nacimiento}}">
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