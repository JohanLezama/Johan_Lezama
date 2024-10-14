@extends('layout')
@section('titulo')
    - Listado de Alumnos
@endsection
@section('body')
<style>
    .card {
        background: rgba(255, 255, 255, 0.8);
        border: none;
    }

    .input-group-text {
        background-color: #d3dce6;
        color: #666;
        border: none;
    }

    .form-control:focus {
        border-color: #d3dce6;
        box-shadow: 0 0 10px rgba(211, 220, 230, 0.5);
    }

    .btn-dark {
        background-color: #424242;
        border: none;
    }

    .btn-dark:hover {
        background-color: #616161;
    }

    .btn-info {
        background-color: #64b5f6;
        border: none;
    }

    .btn-info:hover {
        background-color: #90caf9;
    }

    .btn-danger {
        background-color: #ef5350;
        border: none;
    }

    .btn-danger:hover {
        background-color: #ef9a9a;
    }
</style>
<div class="row mt-3">
    <div class="col-md-6 offset-md-3">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TELEFONO</th>
                        <th>NOMBRE</th>
                        <th>CONTRASEÑA</th>
                        <th>FECHA DE NACIMIENTO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $i => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->matricula }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->carrera }}</td>
                            <td>{{ $item->fecha_nacimiento }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('alumnos.edit', $item->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('alumnos.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach                      
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
